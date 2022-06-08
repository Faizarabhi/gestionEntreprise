<?php

class CloudinaryController extends Controller
{
        public function getSignature()
    {
        $this->json(cloudinarySign());
    }
}