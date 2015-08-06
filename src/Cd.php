<?php

      class Cd
    {
        private $album_name;
        private $artist_name;
        private $album_cover;

        //Constuctors
        function __construct($album_name, $artist_name, $album_cover)
        {
          $this->album_name = $album_name;
          $this->artist_name = $artist_name;
          $this->album_cover = $album_cover;
        }

        //Setters
        function setAlbum($new_album_name)
        {
          $this->album_name = (string) $new_album_name;
        }

        function setArtist($new_artist_name)
        {
          $this->artist_name = (string) $new_artist_name;
        }

        function setCover($new_album_cover)
        {
          $this->album_cover = $new_album_cover;
        }

        //Getters
        function getAlbum()
        {
          return $this->album_name;
        }

        function getArtist()
        {
          return $this->artist_name;
        }

        function getCover()
        {
          return $this->album_cover;
        }

        //Save Method
        function save()
        {
          array_push($_SESSION['list_of_cds'], $this);
        }


        //Static Methods

        ///Get All Method
        static function getAll()
        {
          return $_SESSION['list_of_cds'];
        }

        ///Delete All Method
        static function deleteAll()
        {
          $_SESSION['list_of_cds'] = array();
        }
    }

?>
