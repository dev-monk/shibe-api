<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShibeController extends AbstractController {

    /**
     * @Route("/api/shibes/random/{count}")
     */
    public function getRandomShibes (HttpClientInterface $httpClient, $count) {
        $res = $httpClient->request('GET', 'http://shibe.online/api/shibes', [
            'query' => [
                'count' => $count,
                'urls' => 'true',
                'httpsUrls' => 'false'
            ]
        ]);

        $content = json_encode (array ('urls' => json_decode ($res->getContent ())));
        return new Response ($content,
                             $res->getStatusCode (),
                             ['content-type' => 'application/json']);
    }
}
