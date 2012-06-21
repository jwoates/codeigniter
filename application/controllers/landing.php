<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Landing extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('zend');
    }

    function index(){

        $this->zend->load('Zend/Gdata/YouTube');
        $this->yt = new Zend_Gdata_YouTube();
        $this->yt->setMajorProtocolVersion(2);



        /* cache */
        /*
        $this->load->driver('cache', array('adapter' => 'file', 'backup' => 'file'));
        if ( ! $landingCache = $this->cache->get('landingCache'))
        {
             echo 'Saving to the cache!<br />';
             $landingCache = 'landingCachebarbazzzzzz7777!';

             // Save into the cache for 5 minutes
             $this->cache->save('landingCache', $landingCache, 300);
        }
        */

        $userName = "xbox";
        $playlistListFeed = $this->yt->getPlaylistListFeed($userName);
        

        $url = 'http://gdata.youtube.com/feeds/api/playlists/1043609265A2F46F?v=2';
        $videoFeed = $this->yt->getPlaylistVideoFeed($url);
        // Print out metadata for each video in the playlist
        $pl_array = array();
        foreach ($videoFeed as $playlistVideoEntry) {
          // Reuse the printVideoEntry function defined earlier to show video metadata
            array_push($pl_array, $this->printVideoEntry($playlistVideoEntry));
        }
        $data['playlist']       = $pl_array;
        $data['playlist_json']  = json_encode($pl_array);
        
        //print("<pre>".print_r($pl_array,true)."</pre>");

        ## $data['playlist'] = $this->printPlaylistListFeed($playlistListFeed, true);
        ## $data['playlist'] = $this->printPlaylistListFeed($videoFeed, true);

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

        //$this->output->cache(10);
        //$this->output->set_output($data);
        $this->load->view('cache', $data);
    }
    
    private function printPlaylistListFeed($playlistListFeed, $showPlaylistContents)
    {
        $pl_array = array();
        $count = 1;
        foreach ($playlistListFeed as $playlistListEntry) {
            if( $count > 3  ) return false;
            #print("<pre>".print_r($this->printPlaylistListEntry($playlistListEntry, true),true)."</pre>");
            array_push($pl_array, $this->printPlaylistListEntry($playlistListEntry, true));   
            $count++;
        }
        return $pl_array;
    }    
    /*
    private function printVideoFeed($videoFeed)
    {
      $count = 1;
      foreach ($videoFeed as $videoEntry) {
        #echo "Entry # " . $count . "\n";
        $this->printVideoEntry($videoEntry);
        #echo "\n";
        $count++;
      }
    }
    */
    private function printPlaylistListEntry($playlistListEntry, $showPlaylistContents = false)
    {

        $pe_array = array();
        # echo 'Title: ' . $playlistListEntry->title->text . "\n";
        # echo 'Description: ' . $playlistListEntry->description->text . "\n";
        $pe_array['playlist_title']          = $playlistListEntry->title->text;
        //$pe_array['playlist_description']    = ($playlistListEntry->description->text != '') ? $playlistListEntry->description->text : 'no description';
        $pe_array['playlist_content']        = array();

        $this->yt->setMajorProtocolVersion(2);

        if ($showPlaylistContents === true) {
            $playlistVideoFeed = $this->yt->getPlaylistVideoFeed($playlistListEntry->getPlaylistVideoFeedUrl());
            
            // Print out metadata for each video in the playlist
            foreach ($playlistVideoFeed as $playlistVideoEntry) {
                array_push($pe_array['playlist_content'],$this->printVideoEntry($playlistVideoEntry));
            }
        }
        return $pe_array;
    }

    private function printVideoEntry($videoEntry) 
    {
        $video = array();
        $video['title']     = $videoEntry->getVideoTitle();
        $video['id']        = $videoEntry->getVideoId();
        
        return $video;

        #echo 'Video: ' . $videoEntry->getVideoTitle() . "<br />";
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
        
        /*
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
        */
    }
    
}