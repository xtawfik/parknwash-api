<?php

namespace App\Containers\Settings\Tasks;

use App\Containers\Settings\Data\Repositories\SettingRepository;
use App\Containers\Settings\Models\Setting;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateSettingTask extends Task
{

  protected $repository;

  public function __construct(SettingRepository $repository)
  {
    $this->repository = $repository;
  }

  /**
   * @throws CreateResourceFailedException
   */
  public function run()
  {
    $data = request()->all();
    $saved_setting = null;

    // Loop through the data and check if the key already exists
    foreach ($data as $key => $value) {
      $setting = $this->repository->findWhere(['key' => $key])->first();
      if ($setting) {
        $saved_setting = $this->repository->update([
          'value' => $value
        ], $setting->id);
      } else{
        $data['key'] = $key;
        $data['value'] = $value;

        $saved_setting = $this->repository->create($data);
      }
    }

    return $saved_setting;
  }
}
