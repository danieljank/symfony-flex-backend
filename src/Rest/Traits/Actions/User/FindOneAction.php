<?php
declare(strict_types = 1);
/**
 * /src/Rest/Traits/Actions/User/FindOneAction.php
 *
 * @author TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */

namespace App\Rest\Traits\Actions\User;

use App\Rest\Traits\Methods\FindOneMethod;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Throwable;

/**
 * Trait FindOneAction
 *
 * Trait to add 'findOneAction' for REST controllers for 'ROLE_USER' users.
 *
 * @see \App\Rest\Traits\Methods\FindOneMethod for detailed documents.
 *
 * @package App\Rest\Traits\Actions\User
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
trait FindOneAction
{
    use FindOneMethod;

    /**
     * @Route(
     *      "/{id}",
     *      requirements={
     *          "id" = "%app.uuid_v1_regex%",
     *      },
     *      methods={"GET"},
     *  )
     *
     * @Security("is_granted('ROLE_USER')")
     *
     * @throws Throwable
     */
    public function findOneAction(Request $request, string $id): Response
    {
        return $this->findOneMethod($request, $id);
    }
}
