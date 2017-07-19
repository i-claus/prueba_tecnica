<?php
/*
  Esta clase fue creada conservando los mismos nombres de la clase original SpotifyWebAPI para evitar problemas con rutas.
*/
namespace SpotifyWebAPI;

class SpotifyWebAPI
{

    const RETURN_ASSOC = 'assoc';
    const RETURN_OBJECT = 'object';

    protected $accessToken = 'BQAkAVLUoR3aWuHZG5HrjikzI9hqBot3rmGblASlzMPzRTsgh3J';
    protected $lastResponse = [];
    protected $request = null;
    
    public function __construct($request = null)
    {
        $this->request = $request ?: new Request();
    }

    
    protected function authHeaders()
    {
        $headers = [];

        if ($this->accessToken) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        return $headers;
    }

    
    protected function idToUri($ids, $type = 'track')
    {
        $type = 'spotify:' . $type . ':';

        $ids = array_map(function ($id) use ($type) {
            if (substr($id, 0, strlen($type)) != $type) {
                $id = $type . $id;
            }

            return $id;
        }, (array) $ids);

        return (count($ids) == 1) ? $ids[0] : $ids;
    }

    
    protected function uriToId($uriIds, $type = 'track')
    {
        $type = 'spotify:' . $type . ':';

        $uriIds = array_map(function ($id) use ($type) {
            return str_replace($type, '', $id);
        }, (array) $uriIds);

        return (count($uriIds) == 1) ? $uriIds[0] : $uriIds;
    }

    //función que llama a albums Daft Punk

   public function getAlbums($albumIds, $options = [])
    {
        $albumIds = $this->uriToId($albumIds, 'album');

        $options = (array) $options;
        $options['ids'] = implode(',', (array) $albumIds);

        $headers = $this->authHeaders();

        $uri = '/v1/albums/';

        $this->lastResponse = $this->request->api('GET', $uri, $options, $headers);

        return $this->lastResponse['body'];
    }

?>