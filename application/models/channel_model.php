<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Channel_model extends CI_Model {


    var $userName   = '';
    var $yt   = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function demo($str) 
    {
      return "this is demo: " . $str;
    }

    function playlist($userName) 
    {
      $this->yt = connectyoutube();
      $this->yt->setMajorProtocolVersion(2);
      $playlistListFeed = $this->yt->getPlaylistListFeed($userName);
      foreach ($playlistListFeed as $playlistListEntry) {
        $playlist['title'] = $playlistListEntry->title->text;
        $playlist['id'] = $playlistListEntry->getPlaylistID();
        $playlists[] = $playlist;
        $playlistVideoFeed = $yt->getPlaylistVideoFeed($playlistListEntry->getPlaylistVideoFeedUrl());
        foreach ($playlistVideoFeed as $videoEntry) {
          $playlist_assignment['youtube_id'] = substr($videoEntry->getVideoWatchPageUrl(),31,11);
          $playlist_assignment['id'] = $playlist['id'];
          $playlist_assignments[] = $playlist_assignment;
        }
      }
      $everything['playlists'] = $playlists;
      $everything['playlist_assignments'] = $playlist_assignments;
      return $everything;
    }

}





