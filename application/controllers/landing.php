<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Landing extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->config('twitter');
        $this->load->library('zend');
        $this->load->driver('cache', array('adapter' => 'file', 'backup' => 'file'));
        # no sneaking in
        if($this->session->userdata('user_age') == 'denied')
        {
            redirect('restricted/age');
            exit;
        }elseif($this->session->userdata('user_age') != 'approved'){
            redirect('agegate');
        }
    }

    function index(){
        

        /* have you authenticated? */
        /*
        $data['fb_data'] = $fb_data = $this->session->userdata('fb_data'); // This array contains all the user FB information;
        
        if((!$fb_data['uid']) or (!$fb_data['me']))
        {
            redirect('core');
        }
        */
        /* feeds */
        $data['fb_photos']      = $this->getPhotoFeed('live');

        /* youtube */
        $this->zend->load('Zend/Gdata/YouTube');
        $this->yt = new Zend_Gdata_YouTube();
        $this->yt->setMajorProtocolVersion(2);
        # test url
        #$url = 'http://gdata.youtube.com/feeds/api/playlists/1043609265A2F46F?v=2';
        $url = 'http://gdata.youtube.com/feeds/api/playlists/0A653148CC3DE1CD?v=2';
        # live url
        $videoFeed = $this->yt->getPlaylistVideoFeed($url);
        // Print out metadata for each video in the playlist
        $pl_array = array();
        foreach ($videoFeed as $playlistVideoEntry) {
          // Reuse the printVideoEntry function defined earlier to show video metadata
            array_push($pl_array, $this->printVideoEntry($playlistVideoEntry));
        }
        $data['yt_playlist']                = $pl_array;
        $data['twitter_approved_feed']      = $this->getApprovedTwitterFeed();

        $data['yield'] = $this->load->view('facebook/landing',$data, TRUE);
        header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
        if($this->agent->is_mobile() == true)
        {
            $this->load->view('layout/mobile', $data);
        }else{
            $this->load->view('layout/general', $data);
        }
    }
  
    /* ********************************************************************************************
    PRIVATE FUNCTIONS
    ******************************************************************************************** */
    
    private function getTwitterFeed($url=null)
    {
        if ( ! $get_twitter = $this->cache->get('get_twitter'))
        {
            $get_twitter = file_get_contents($this->config->item('tw_feed_url'));
        }
        $this->cache->save('get_twitter', $get_twitter, 600);
        return json_decode($get_twitter);        
    }
    
    private function getApprovedTwitterFeed($url=null)
    {
        if ( ! $get_approved_twitter = $this->cache->get('get_approved_twitter'))
        {
            $get_approved_twitter = file_get_contents('http://feeds.tidytweet.com/client/sdcc/feed/roundhousedemo/legacy.atom');
        }
        $this->cache->save('get_approved_twitter', $get_approved_twitter, 600);
        return simplexml_load_string($get_approved_twitter); 

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
            
            array_push($pl_array, $this->printPlaylistListEntry($playlistListEntry, true));   
            $count++;
        }
        return $pl_array;
    }    
    private function printPlaylistListEntry($playlistListEntry, $showPlaylistContents = false)
    {

        $pe_array = array();
        # $playlistListEntry->title->text ;
        # $playlistListEntry->description->text;
        $pe_array['playlist_title']          = $playlistListEntry->title->text;
        $pe_array['playlist_content']        = array();

        $this->yt->setMajorProtocolVersion(2);

        if ($showPlaylistContents === true) {
            $playlistVideoFeed = $this->yt->getPlaylistVideoFeed($playlistListEntry->getPlaylistVideoFeedUrl());
            
            // metadata for each video in the playlist
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
    }
    
}