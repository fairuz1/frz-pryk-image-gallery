<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use http\Env\Response;
use App\Models\Post;

    /**
    * @OA\Info(
    *   description="Contoh API doc menggunakan OpenAPI/Swagger",
    *   version="0.0.1",
    *   title="Contoh API documentation",
    *   termsOfService="http://swagger.io/terms/",
    *   @OA\Contact(
    *       email="choirudin.emchagmail.com"
    *   ),
    *   @OA\License(
    *       name="Apache 2.0",
    *       url="http://www.apache.org/licenses/LICENSE-2.0.html"
    *   )
    * )
    */

class GreetController extends Controller {
    /**
     * @OA\Get(
     *     path="/api/greet",
     *     tags={"greeting"},
     *     summary="Returns a Sample API response",
     *     description="A sample greeting to test out the API",
     *     operationId="greet",
     *     @OA\Parameter(
     *          name="firstname",
     *          description="nama depan",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="lastname",
     *          description="nama belakang",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="successful operation"
     *     )
     * )
     */
    public function greet(Request $request) {
        $userData = $request->only([
            'firstname',
            'lastname',
        ]);

        if (empty($userData['firstname']) && empty($userData['lastname'])) {
            return new \Exception('Missing data', 404);
        }

        return 'Halo ' . $userData['firstname'] . ' ' . $userData['lastname'];
    }

        /**
     * @OA\Get(
     *     path="/api/gallery",
     *     tags={"gallery"},
     *     summary="Returns an original images response",
     *     description="A sample original image galleries from API",
     *     operationId="index",
     *     @OA\Response(
     *         response="200",
     *         description="successful operation"
     *     )
     * )
     */
    public function index() {
        $data = array(
            'galleries' =>Post::where('picture', '!=', '')->whereNotNull('picture')->orderBy('created_at', 'desc')->get()
        );
        return $data;
    }

    public function gallery() {
        $data = array(
            'id' => 'posts',
            'menu' => 'Gallery',
            'galleries' => Post::where('picture', '!=', '')->whereNotNull('picture')->orderBy('created_at', 'desc')->paginate(5)
        );
        return view('gallery.index-api')->with($data);
    }
}
