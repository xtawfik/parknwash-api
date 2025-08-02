<?php

namespace App\Containers\Launch\UI\API\Controllers;

use App\Containers\CarModel\Models\CarModel;
use App\Containers\Category\Models\Category;
use App\Containers\Category\UI\API\Transformers\CategoryTransformer;
use App\Containers\Country\Models\Country;
use App\Containers\Country\UI\API\Transformers\CountryTransformer;
use App\Containers\Employee\Models\Employee;
use App\Containers\EmployeeExpense\Models\EmployeeExpense;
use App\Containers\JobDescription\Models\JobDescription;
use App\Containers\Mall\Models\Mall;
use App\Containers\Mall\UI\API\Transformers\MallTransformer;
use App\Containers\Nationality\Models\Nationality;
use App\Containers\Park\Models\Park;
use App\Containers\Product\Models\Product;
use App\Containers\Product\UI\API\Transformers\ProductTransformer;
use App\Containers\Service\Models\Service;
use App\Containers\Settings\Models\Setting;
use App\Containers\User\Models\User;
use App\Containers\UserCar\Models\UserCar;
use App\Containers\UserCar\UI\API\Transformers\UserCarTransformer;
use App\Containers\Employee\UI\API\Transformers\EmployeeTransformer;
use App\Ship\Events\SendSMSEvent;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Containers\Bank\Models\Bank;
/**
 * Class Controller
 *
 * @package App\Containers\Lawyers\UI\API\Controllers
 */
class Controller extends ApiController
{

  /**
   * Launch Api
   *
   * @param Request $request
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function launch(Request $request)
  {
    $malls = Mall::with('parks')->where('active', 1)->get();
    $services = [
//      [
//        'name' => 'Sedan Car Wash',
//        'price' => [['name' => 'OUT', 'price' => 4], ['name' => 'IN', 'price' => 5], ['name' => 'FULL', 'price' => 5]],
//        'icon' => asset('storage/services/sedan.png')
//      ],
//      [
//        'name' => 'SUV Car Wash',
//        'price' => [['name' => 'OUT', 'price' => 5], ['name' => 'IN', 'price' => 5], ['name' => 'FULL', 'price' => 5]],
//        'icon' => asset('storage/services/suv.png')
//      ],
      [
        'name' => 'MALL WASH',
        'price' => [10],
        'icon' => asset('storage/services/vvip.png')
      ],
//      [
//        'name' => 'HOME WASH',
//        'price' => [7],
//        'icon' => asset('storage/services/vip.png')
//      ],
    ];


    $employee_expenses = EmployeeExpense::where('date', 'like', "2022-09%")->where('employee_id', 6)->get();

    $random = rand(1, 1000);

    return $this->json([
      "data" => [
        "settings" => Setting::all(),
        "malls" => $this->transform($malls, MallTransformer::class)['data'],
        "services" => $services,
        "banners" => [
          "dark" => [
            'https://parknwash.com/banners/1.png?x=' . $random,
            'https://parknwash.com/banners/3.png?x=' . $random,
            'https://parknwash.com/banners/5.png?x=' . $random,
          ],
          "light" => [
            'https://parknwash.com/banners/2.png?x=' . $random,
            'https://parknwash.com/banners/4.png?x=' . $random,
            'https://parknwash.com/banners/6.png?x=' . $random,
          ]
        ],
        "employee_expenses" => $employee_expenses->sum('amount')
      ]
    ]);

  }

  public function updateRealJob(Request $request)
  {
    // Update real job in salary_sheet table
    $employees = Employee::all();
    // Store the real job name in array with employee id as key

  }

  public function userdata()
  {
    $user = auth()->user();
    $cars = UserCar::where("user_id", $user->id)->get();

    return $this->json([
      "data" => [
        "cars" => $this->transform($cars, UserCarTransformer::class)['data'],
        "balance" => $user->balance,
      ]
    ]);
  }

  public function dropdowns()
  {
    // Get only id and name for dropdowns return [id, name]
    $malls = Mall::select('id', 'name_en as name')->get();
    $nationalities = Nationality::select('id', 'name_en as name')->orderBy('sorter', 'desc')->get();
    $jobDescriptions = JobDescription::select('id', 'name_en as name')->orderBy('sorter', 'asc')->get();
    $countries = Country::select('id', 'name_en as name')->get();

    $employees = Employee::select('id', 'name_en as name', 'employee_code', 'user_id')->orderBy('employee_code')->get();

    $all_car_models = CarModel::select('id', 'name', 'logo')->get();
    $car_models = [];
    foreach ($all_car_models as $car_model) {
      $car_models[] = [
        "id" => $car_model->id,
        "name" => $car_model->name,
        "logo" => "https://parknwash.com/brands/" . $car_model->logo
      ];
    }

    $areas = Park::select('id', 'park as name')->get();

    $services = Service::with(["service_type", "car"])->get();
    $service_list = [];
    foreach ($services as $service) {
      $service_list[] = [
        "id" => $service->id,
        "name" => $service->car->name_en . " - " . $service->service_type->name_en,
      ];
    }

    // Banks
    $banks = Bank::select('id', 'name_en as name')->get();

    // Religions
    $religions = [
      [
        "id" => 'muslim',
        "name" => "Muslim"
      ],
      [
        "id" => 'christian',
        "name" => "Christian"
      ],
      [
        "id" => 'other',
        "name" => "Other"
      ],
    ];

    return $this->json([
      "data" => [
        "jobDescriptions" => $jobDescriptions,
        "nationalities" => $nationalities,
        "malls" => $malls,
        "employees" => $employees,
        "car_models" => $car_models,
        "areas" => $areas,
        "services" => $service_list,
        "countries" => $countries,
        "banks" => $banks,
        "religions" => $religions
      ]
    ]);
  }

  public function getEmployeeImageUrl(Request $request) {
    $employee = Employee::find($request->employee_id);
    $employee_image = null;
    if ($employee) {
      $medias = $employee->getMedia("image");
      if ($medias) {
        $url = [];
        foreach ($medias as $media) {
          $mediaUrl = $media->getUrl();
          if (strpos($mediaUrl, "http") === false) {
            $mediaUrl = "https://{$media->getUrl()}";
          }
          $url[] = str_replace("/app/", "/", $mediaUrl);
        }
        if (count($url) === 1) {
          $url = $url[0];
        }
        $employee_image = $url;
      }
    }

    if (!$employee_image) {
      abort(404);
    }

    // If it's a remote URL, redirect
    if (is_string($employee_image) && (str_starts_with($employee_image, 'http://') || str_starts_with($employee_image, 'https://'))) {
      return redirect($employee_image);
    }

    // If it's a local file, return the file
    // Remove domain if present
    $localPath = $employee_image;
    $publicPath = public_path(parse_url($localPath, PHP_URL_PATH));
    if (file_exists($publicPath)) {
      return response()->file($publicPath);
    }

    abort(404);
  }

  public function checkPermissions()
  {
    $permissions_map = [
      "payroll" => [
        "admin@admin.com"
      ]
    ];

    $user = auth()->user();
    $email = $user->email;

    $permission = request('permission');

    if (isset($permissions_map[$permission]) && in_array($email, $permissions_map[$permission])) {
      return $this->json([
        "data" => [
          "has_permission" => true
        ]
      ]);
    }

    return $this->json([
      "data" => [
        "has_permission" => false
      ]
    ]);
  }

  public function dashboard()
  {
    $employees = Employee::with([
      'nationality' => function ($query) {
        $query->select('id', 'name_en');
      },
      'job_description' => function ($query) {
        $query->select('id', 'name_en');
      }
    ])
      ->select([
        'id',
        'user_id',
        'name_en as employee_name',
        'employee_code',
        'civil_id as employee_civil_id',
        'work_status as employee_work_status',
        'nationality_id',
        'job_description_id'
      ])
      ->get()
      ->map(function ($employee) {
        // Get employee image
        $medias = $employee->getMedia( 'image' );
        if ( $medias ) {
          $url = [];
          foreach ($medias as $media) {
            $mediaUrl = $media->getUrl();

            if ( strpos( $mediaUrl, "http" ) === false ) {
              $mediaUrl = "https://{$media->getUrl()}";
            }

            $url[] = str_replace("/app/", "/", $mediaUrl);
          }

          if(count($url) === 1) {
            $url = $url[0];
          }

          $employee->employee_image = $url;
        }
        // Append the related model's name_en if it exists
        return [
          'id' => $employee->id,
          'user_id' => $employee->user_id,
          'employee_name' => $employee->employee_name,
          'employee_code' => $employee->employee_code,
          'employee_civil_id' => $employee->employee_civil_id,
          'employee_work_status' => $employee->employee_work_status,
          'employee_nationality' => optional($employee->nationality)->name_en,
          'employee_job_description' => optional($employee->job_description)->name_en,
          'employee_image' => $employee->employee_image ?? '',
        ];
      });
    return $this->json([
      "data" => [
        $employees
      ]
    ]);
  }

  public function contact()
  {
    return ["success" => true];
  }

  public function otp()
  {
    App::make(Dispatcher::class)->dispatch(new SendSMSEvent("1234", "+201206777756"));
    return ["success" => true];
  }

  public function verificationCode(Request $request)
  {
    $user = User::where('phone', $request->username)->first();
    if (!$user) {
      return $this->json([
        "sent" => false
      ]);
    }

    $code = rand(111111, 999999);

    $user->update([
      'phone_verification_code' => $code
    ]);

    // TODO: send sms

    return $this->json([
      "sent" => true
    ]);
  }

  public function resetPassword(Request $request)
  {
    $user = User::where('phone', $request->username)->first();
    if (!$user or $user->phone_verification_code != $request->code) {
      return $this->json([
        "verified" => false
      ]);
    }

    $user->update([
      'password' => Hash::make($request->password)
    ]);

    return $this->json([
      "verified" => true
    ]);
  }

//  public function notifications() {
//    $notifications = Notifications::all();
//
//    return $this->transform( $notifications, NotificationsTransformer::class );
//  }

// sbp_450c7e0623907f5072b2835daa8ef5d0ab14402f

  public function payment(Request $request)
  {

    $payment_id = $request->payment_id;
    if($payment_id) {
      $this->updatePaymentStatus($payment_id);

      echo '<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parknwash Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
 <div class="container mx-auto px-4 overflow-hidden h-full">
<div class="flex flex-col items-center justify-center h-full bg-white text-center px-4">
  <div class="rounded-full bg-green-100 p-10 mb-8">
    <svg
      xmlns="http://www.w3.org/2000/svg"
      width="24"
      height="24"
      viewBox="0 0 24 24"
      fill="none"
      stroke="currentColor"
      stroke-width="2"
      stroke-linecap="round"
      stroke-linejoin="round"
      class="w-16 h-16 text-green-500"
    >
      <polyline points="20 6 9 17 4 12"></polyline>
    </svg>
  </div>
  <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-800 mb-4">Payment Successful!</h1>
  <p class="text-md md:text-lg text-gray-600 mb-8">
    Thank you for your purchase. Your payment has been successfully processed.
  </p>
  <button class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 px-4 py-2 text-white bg-blue-500 hover:bg-blue-600">
    <a class="flex items-center justify-center" href="https://parknwash.com">
      Return to Parknwash
    </a>
  </button>
  <p class="text-md md:text-sm text-gray-400 mt-4">
    You can close this window now.
  </p>
</div>
</div>';

    }

    echo '<script>window.ReactNativeWebView.postMessage("done")</script>';

    return null;
  }

  public function paymentError(Request $request)
  {
    echo '<script>window.ReactNativeWebView.postMessage("error")</script>';

    return null;
  }

  private function updatePaymentStatus($payment_id) {
    $response = Http::withHeaders([
      'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImZjd2JmY215cWtsY3J5b2F0cXppIiwicm9sZSI6ImFub24iLCJpYXQiOjE2OTg2ODczODIsImV4cCI6MjAxNDI2MzM4Mn0.V2O-zYIcSwqVm5ucZq3q-59FaKEkt-8RTVudxCt32-I',
      'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImZjd2JmY215cWtsY3J5b2F0cXppIiwicm9sZSI6ImFub24iLCJpYXQiOjE2OTg2ODczODIsImV4cCI6MjAxNDI2MzM4Mn0.V2O-zYIcSwqVm5ucZq3q-59FaKEkt-8RTVudxCt32-I',
      'Content-Type' => 'application/json'
    ])->patch('https://fcwbfcmyqklcryoatqzi.supabase.co/rest/v1/payment?payment_id=eq.' . $payment_id, [
      'status' => 'success'
    ]);
  }
}
