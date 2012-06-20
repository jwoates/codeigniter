<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Landing extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('zend');
    }

    function index(){
        # playlist id: PL1043609265A2F46F
        // TEST YouTube playlist
        $this->zend->load('Zend/Gdata/YouTube');
     
        #$location = Zend_Gdata_YouTube::VIDEO_URI;
        
        $this->yt = new Zend_Gdata_YouTube();
        // set the version to 2 to receive a version 2 feed of entries
        $this->yt->setMajorProtocolVersion(2);


        #$videoFeed = $this->yt->getVideoFeed($location);
        $url = 'http://gdata.youtube.com/feeds/api/playlists/1043609265A2F46F?v=2';
        $videoFeed = $this->yt->getPlaylistVideoFeed($url);

        $this->printVideoFeed($videoFeed);

        /*
        $userName = "xbox";
        $playlistListFeed = $this->yt->getPlaylistListFeed($userName);
        
        $this->printPlaylistListFeed($playlistListFeed, true);   
        */


        // $fb_data = $this->session->userdata('fb_data'); // This array contains all the user FB information
 
        // if((!$fb_data['uid']) or (!$fb_data['me']))
        // {
        //     // you can redirect the user somewhere else
        //     redirect('core');
        // }
        // else
        // {
        //     $data = array(
        //         'fb_data'   => $fb_data,
        //         'app_id'    => $this->config->item('appId')
        //     );

        // }
        // $this->load->view('landing', $data);
    }
    
    public function printPlaylistListFeed($playlistListFeed, $showPlaylistContents)
    {
      $count = 1;
      foreach ($playlistListFeed as $playlistListEntry) {
        
        if( $count > 2  ) return false;

        #echo 'Entry # ' . $count . "\n";
        // This function is defined in the next section
        $this->printPlaylistListEntry($playlistListEntry, true);
        # $this->printPlaylistListEntry($playlistListEntry, $showPlaylistContents);

        echo "\n";
        $count++;
      }
    }    

    public function printVideoFeed($videoFeed)
    {
      $count = 1;
      foreach ($videoFeed as $videoEntry) {
        #echo "Entry # " . $count . "\n";
        $this->printVideoEntry($videoEntry);
        #var_dump($videoEntry);
        #echo "\n";
        $count++;
      }
    }

    public function printPlaylistListEntry($playlistListEntry, $showPlaylistContents = false)
    {
      echo 'Title: ' . $playlistListEntry->title->text . "\n";
      #echo 'Description: ' . $playlistListEntry->description->text . "\n";

      // assuming $this->yt is a fully authenticated service object, set the version to 2
      // to retrieve additional metadata such as yt:uploaded and media:credit
      $this->yt->setMajorProtocolVersion(2);

      if ($showPlaylistContents === true) {
        // Get the feed of videos in the playlist
        $playlistVideoFeed =
          $this->yt->getPlaylistVideoFeed($playlistListEntry->getPlaylistVideoFeedUrl());

        // Print out metadata for each video in the playlist
        foreach ($playlistVideoFeed as $playlistVideoEntry) {
          // Reuse the printVideoEntry function defined earlier to show video metadata
          $this->printVideoEntry($playlistVideoEntry);
      
          // The following details are also available for playlist entries
          #echo 'Video originally uploaded on: ' . $playlistVideoEntry->getMediaGroup->getUploaded()->text . "\n";
      
          // Also check the <media:credit> element to see whether the video
          // was uploaded by a partner.
          $mediaCredit = $playlistVideoEntry->getMediaGroup()->getMediaCredit();
          if ($mediaCredit) {

            #echo 'Video originally uploaded by ' . $mediaCredit->text . "\n";
            #echo 'Media credit role: ' . $mediaCredit->getRole() . "\n";
        
            // if the yt:type attribute is present, then the video was uploaded
            // by a YouTube partner
            #echo 'Media credit type: ' . $mediaCredit->getYTtype() . "\n";
          }
        }
      }
    }

    public function printVideoEntry($videoEntry) 
    {
      // the videoEntry object contains many helper functions
      // that access the underlying mediaGroup object
      echo 'Video: ' . $videoEntry->getVideoTitle() . "<br />";
      #echo 'Video ID: ' . $videoEntry->getVideoId() . "\n";
      #echo 'Updated: ' . $videoEntry->getUpdated() . "\n";
      #echo 'Description: ' . $videoEntry->getVideoDescription() . "\n";
      #echo 'Category: ' . $videoEntry->getVideoCategory() . "\n";
      #echo 'Tags: ' . implode(", ", $videoEntry->getVideoTags()) . "\n";
      #echo 'Watch page: ' . $videoEntry->getVideoWatchPageUrl() . "\n";
      #echo 'Flash Player Url: ' . $videoEntry->getFlashPlayerUrl() . "\n";
      #echo 'Duration: ' . $videoEntry->getVideoDuration() . "\n";
      #echo 'View count: ' . $videoEntry->getVideoViewCount() . "\n";
      #echo 'Rating: ' . $videoEntry->getVideoRatingInfo() . "\n";
      #echo 'Geo Location: ' . $videoEntry->getVideoGeoLocation() . "\n";
      #echo 'Recorded on: ' . $videoEntry->getVideoRecorded() . "\n";
      
      // see the paragraph above this function for more information on the 
      // 'mediaGroup' object. in the following code, we use the mediaGroup
      // object directly to retrieve its 'Mobile RSTP link' child
      foreach ($videoEntry->mediaGroup->content as $content) {
        if ($content->type === "video/3gpp") {
          # echo 'Mobile RTSP link: ' . $content->url . "\n";
        }
      }
      
      #echo "Thumbnails:\n";
      $videoThumbnails = $videoEntry->getVideoThumbnails();

      foreach($videoThumbnails as $videoThumbnail) {
        #echo $videoThumbnail['time'] . ' - ' . $videoThumbnail['url'];
        #echo ' height=' . $videoThumbnail['height'];
        #echo ' width=' . $videoThumbnail['width'] . "\n";
      }
    }    

}