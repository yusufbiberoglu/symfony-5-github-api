<?php

namespace App\Controller;

use App\Service\GitHubApi;
use GuzzleHttp\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class GithubController extends AbstractController
{
    /**
     * @Route("/{username}", name="github", defaults={"username": "username"})
     */
    public function github($username)
    {
        return $this->render('github/index.html.twig', [
            'username' => $username
        ]);
    }


    /**
     * @Route("/profile/{username}", name="profile")
     */
    public function profile(GitHubApi $gitHubApi, $username)
    {
        $profile = $gitHubApi->getProfile($username);

        return $this->render('github/profile.html.twig', $profile);
    }

    /**
     * @Route("/repos/{username}", name="repos")
     */
    public function repos(GitHubApi $gitHubApi, $username)
    {
        $repos = $gitHubApi->getRepos($username);

        return $this->render('github/repos.html.twig', $repos);
    }
}











