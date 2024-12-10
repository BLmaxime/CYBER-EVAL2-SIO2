<?php

namespace App\Service;

use App\Entity\Book;
use App\Entity\Client;


class LateFeeCalculator
{
    public function calculateLateFee(\DateTime $returndate, \DateTime $duedate): float
    {
      $prix = 0;
      $retard = $returndate->getTimestamp() - $duedate->getTimestamp();
      if ($retard > 0) {
        for ($i = 0; $i < $retard; $i++) {
          $prix += 0.5;
        }
      }
      return $prix;
    }
}