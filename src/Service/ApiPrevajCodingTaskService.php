<?php

namespace App\Service;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;
use App\Entity\Contact;


class ApiPrevajCodingTaskService{
    private $EM;
    public function __construct(EntityManagerInterface $EM)
    {
        $this->EM = $EM;
    
    }
    public function _addUser($request)
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $content = $request->getContent();
        $data = $serializer->deserialize($content, User::class, 'json');
        $userRepo = $this->EM->getRepository(User::class);
        $objUser = $userRepo->findOneBy(['email' => $data->getEmail()]);
        if($objUser)
        return "already email existed ";
   $user=new User;
   $user->setEmail($data->getEmail());
   $user->setPassword($data->getPassword());
   $user->setRoles($data->getRoles());
   $this->EM->persist($user);
   $this->EM->flush();
   return $user;
    }
    public function _updateUser($request,$user_id)
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $content = $request->getContent();
        $data = $serializer->deserialize($content, User::class, 'json');
        $userRepo = $this->EM->getRepository(User::class);
        $objUser = $userRepo->findOneBy(['id' => $user_id]);
        if($objUser==null)
        return ["error","Invalid user id"];
        $userCheckEmailRepo = $this->EM->getRepository(User::class);
        $objUserCheckEmail = $userCheckEmailRepo->findOneBy(['email' => $data->getEmail()]);
        if(!$objUserCheckEmail){
            $objUser->setEmail($data->getEmail());
        }
    if($objUser->getEmail()==$data->getEmail() ){
 
   $objUser->setPassword($data->getPassword());
   $objUser->setRoles($data->getRoles());
   $this->EM->persist($objUser);
   $this->EM->flush();
   return ["ok",$objUser];
    }
  
   return ["error","already email existed "];
    }
    public function _getOneByUser($user_id)
    {
        $userRepo = $this->EM->getRepository(User::class);
        $objUser = $userRepo->findOneBy(['id' => $user_id]);
        if ($objUser == null) {
            return ["error","Invalid Id"];
        }
        return ["ok", $objUser];
    }
    public function _getAllUser()
    {
        $carTyperepo = $this->EM->getRepository(User::class);
        $objcarType = $carTyperepo->findAll();
        return $objcarType;
    }
    public function __deleteOfUser($user_id)
    {
        $userRepo = $this->EM->getRepository(User::class);
        $objUser = $userRepo->findOneBy(['id' => $user_id]);
        if ($objUser == null) {
            return ["error", "DataUser Id is Invalid "];
        }
        $this->EM->remove($objUser);
        $this->EM->flush();
        return ["ok", "DataUser is Delete Successfully"];
    }
    public function _addContact($request)
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $content = $request->getContent();
        $data = $serializer->deserialize($content, Contact::class, 'json');
        
   $contact=new Contact;

$contact->setName($data->getName());
$contact->setOffice($data->getOffice());
$contact->setPosition($data->getPosition());
$contact->setAge($data->getAge());
$contact->setSalary($data->getSalary());
$contact->setStartDate(new \DateTime());

   $this->EM->persist($contact);
   $this->EM->flush();
   return $contact;
    }
    public function _updateContact($request,$user_id)
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $content = $request->getContent();
        $data = $serializer->deserialize($content, Contact::class, 'json');
        $userRepo = $this->EM->getRepository(Contact::class);
        $objUser = $userRepo->findOneBy(['id' => $user_id]);
        if($objUser==null)
        return ["error", "Invalid user id"];
        $objUser->setName($data->getName());
$objUser->setOffice($data->getOffice());
$objUser->setPosition($data->getPosition());
$objUser->setAge($data->getAge());
$objUser->setSalary($data->getSalary());
$objUser->setStartDate(new \DateTime());

   $this->EM->persist($objUser);
   $this->EM->flush();
   return ["ok", $objUser];
    
    }
    public function _getOneByContact($user_id)
    {
        $contactRepo = $this->EM->getRepository(Contact::class);
        $objContact = $contactRepo->findOneBy(['id' => $user_id]);
        if ($objContact == null) {
            return ["error","Invalid Id"];
        }
        return ["pk",$objContact];
    }
    public function _getAllContact()
    {
        $contactRepo = $this->EM->getRepository(Contact::class);
        $objContact = $contactRepo->findAll();
        return $objContact;
    }
             
            public function _userAuthentication($request)
            {
                $encoders = [new JsonEncoder()];
                $normalizers = [new ObjectNormalizer()];
                $serializer = new Serializer($normalizers, $encoders);
                $content = $request->getContent();
                $data = $serializer->deserialize($content, User::class, 'json');
                if($data->getEmail()==null )
                return ["error",  "empty email "];

                if( $data->getPassword()==null )
                return ["error",  "empty email "];

                $userRepo = $this->EM->getRepository(User::class);
        $objUser = $userRepo->findOneBy(['email' => $data->getEmail()]);
        if(!$objUser)
        return ["error",  "Invalid email "];
       $id= $objUser->getId();
       $userRepo = $this->EM->getRepository(User::class);
       $objUser = $userRepo->findOneBy(['id'=>$id,'password' => $data->getPassword()]);
       if($objUser){
        $contactRepo = $this->EM->getRepository(Contact::class);
        $objContact = $contactRepo->findAll();
        return ["ok", $objContact];
       }
       return  ["error", "Invalid password"];

    }

}