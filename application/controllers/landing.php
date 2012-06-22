<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Landing extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('zend');
        $this->load->driver('cache', array('adapter' => 'file', 'backup' => 'file'));
    }

    function index(){
        /* have you authenticated? */
        $this->load->model('Facebook_model');
        $fb_data = $this->session->userdata('fb_data'); // This array contains all the user FB information
        $data['fb_data'] = $fb_data;
        
        $data['fb_photos'] = $this->getPhotoFeed('live');


        
        if((!$fb_data['uid']) or (!$fb_data['me']))
        {
            redirect('core');
        }else{
            $data['fb_data'] = $fb_data;
        }

        $this->zend->load('Zend/Gdata/YouTube');
        $this->yt = new Zend_Gdata_YouTube();
        $this->yt->setMajorProtocolVersion(2);





        #$userName = "xbox";
        #$playlistListFeed = $this->yt->getPlaylistListFeed($userName);
        

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

        
        #var_dump($this->facebook->api($this->config->item('facebook_album_id') . '/photos'));

        //print("<pre>".print_r($pl_array,true)."</pre>");

        ## $data['playlist'] = $this->printPlaylistListFeed($playlistListFeed, true);
        ## $data['playlist'] = $this->printPlaylistListFeed($videoFeed, true);

        



        //$this->output->cache(10);
        //$this->output->set_output($data);
        $this->load->view('landing', $data);
    }
    
    private function getPhotoFeed($type=null)
    {
        if ( ! $get_photos = $this->cache->get('get_photos'))
            {
            switch ($type) {
                case 'live':
                    $get_photos = file_get_contents('https://graph.facebook.com/10150575545216023/photos');
                    break;
                case 'api':
                    $get_photos = file_get_contents('http://rhapi.com/facebook/photos/10150575545216023/?type=json&limit=10');
                    break;
                case 'test':
                    $get_photos = 'fuck';
                    break;
                
                default:
                    /* load times are really slow, using static data source for now */
                    $get_photos = file_get_contents('file:///home/allibubba/Projects/codeigniter/album.txt');
                    break;
            }
            $this->cache->save('get_photos', $get_photos, 600);
        }
        return json_decode($get_photos);        
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