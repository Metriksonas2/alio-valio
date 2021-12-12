<?php

namespace App\Service\Ad;

use App\Entity\Ad;
use App\Entity\Scooter;
use App\Entity\User;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;

class AdConfigService
{
    public function createAdObject(Request $request, UserInterface $user, Scooter $scooter)
    {
        $description = $request->request->get('description');
        $price = $request->request->get('price');

        $ad = new Ad();
        $ad->setUser($user);
        $ad->setScooter($scooter);
        $ad->setDescription($description);
        $ad->setType('Active');
        $ad->setPrice($price);
        $ad->setViews(0);
        $ad->setLikes(0);
        $ad->setIsActive(true);
        $ad->setPriority('Aukštas');
        $ad->setExpirationDate((new \DateTime())->modify('+1 month'));

        return $ad;
    }

    public function imageUpload(Scooter $scooter, UploadedFile $file, string $uploadsDirectory) : void
    {
        $image = $scooter->getImage();
        $fileSystem = new Filesystem();

        $fileName = md5(uniqid()) . '.' . $file->guessExtension();
        $file->move($uploadsDirectory, $fileName);

        $scooter->setImage($fileName);
    }
}