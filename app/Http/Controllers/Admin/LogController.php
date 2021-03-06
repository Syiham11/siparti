<?php

namespace App\Http\Controllers\Admin;

use App\Enum\Permission;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\ActivityRepositoryEloquent;

class LogController extends AdminController
{

    protected $activityRepository;

    /**
     * LogController constructor.
     */
    public function __construct(ActivityRepositoryEloquent $activityRepository)
    {
        $this->activityRepository = $activityRepository;

        $this->authorize(Permission::VIEW_LOG()->getKey());

        parent::__construct();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      $logs = $this->activityRepository->paginate(20);

      return view('admin.log.index', compact('logs'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->activityRepository->delete($id);
        return redirect()->back();

    }

    /**
     * Menghapus multiple log
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteMultiple(Request $request)
    {

      $toBeDeletedIds = $request->get('deletedId');

      foreach ($toBeDeletedIds as $id) {

        $this->activityRepository->delete((int)$id);

      }

      return redirect()->back();

    }


}
