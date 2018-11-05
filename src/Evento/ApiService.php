<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 25/10/2018
 * Time: 07:49 AM
 */

namespace App\Evento;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Validator\Exception\InvalidArgumentException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ApiService
{
    private $validator;
    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    public function validateAndEditar($data, $entityClassName, $object)
    {
        $normalizers = [new ObjectNormalizer()];
        $encoders = [new JsonEncoder()];
        $serializer = new Serializer($normalizers, $encoders);

        $result = $serializer->deserialize($data, $entityClassName, 'json', ['object_to_populate' => $object]);
        $errors = $this->validator->validate($result);

        if(count($errors) > 0){
            throw new InvalidArgumentException(Response::HTTP_BAD_REQUEST, (string) $errors);
        }

        return $result;

    }

}