<?php

use SpotifyWebAPI\SpotifyWebAPI;
use SpotifyWebApiExtensions\GuzzleClientFactory;
use SpotifyWebApiExtensions\GuzzleRequestAdapter;
use Doctrine\Common\Cache\FilesystemCache;

require_once('./vendor/autoload.php');

$guzzleAdapter = new GuzzleRequestAdapter(GuzzleClientFactory::create( new FilesystemCache(__DIR__ . '/cache')));

$api = new SpotifyWebAPI($guzzleAdapter);


//Se imprime por pantalla y hago un getArtistAlbums() junto con el id del grupo Daft Punk y el tipo album. 
print_r($api->getArtistAlbums('4tZwfgrHOc3mvqYlEYSvVi', ['album_type' => 'album']));

?>