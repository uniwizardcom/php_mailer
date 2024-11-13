<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\DTO\Email\ViewParameters;

class Card extends AbstractController
{
    #[Route('/social/media/marketing', name: 'social_media_marketing')]
    public function socialMediaMarketing(ViewParameters $viewParameters): Response
    {
        return $this->render($viewParameters->getHtmlPathTemplate());
    }
}
