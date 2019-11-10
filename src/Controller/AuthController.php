<?php

declare(strict_types=1);

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use Nelmio\ApiDocBundle\Annotation\Model;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(path="/auth")
 */
class AuthController extends AbstractController implements ControllerInterface
{

    /**
     * ReviewController constructor.
     */
    public function __construct()
    {
        parent::__construct(User::class);
    }
    /**
     * Register User
     *
     * @Route(name="register", methods={Request::METHOD_POST})
     *
     * @SWG\Tag(name="Auth")
     * @SWG\Response(
     *     response=200,
     *     description="Register User of given identifier and returns the updated object.",
     *     @SWG\Schema(
     *         type="object",
     *         @SWG\Items(ref=@Model(type=User::class))
     *     )
     * )
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function register(Request $request): JsonResponse //, UserPasswordEncoderInterface $encoder)
    {
        return new JsonResponse($request, Response::HTTP_OK);
        /*
        $em = $this->getDoctrine()->getManager();

        $username = $request->request->get('_username');
        $password = $request->request->get('_password');

        $user = new User($username);
        $user->setPassword($encoder->encodePassword($user, $password));
        $em->persist($user);
        $em->flush();
        return new Response(sprintf('User %s successfully created', $user->getUsername()));
        */
    }

    /**
    public function api()
    {
        return new Response(sprintf('Logged in as %s', $this->getUser()->getUsername()));
    }
     * */
}