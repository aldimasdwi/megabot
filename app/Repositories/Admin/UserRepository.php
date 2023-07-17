<?php

namespace App\Repositories\Admin;

use App\DataTables\UserDataTable;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class UserRepositoryEloquent.
 */
class UserRepository extends BaseRepository
{
    protected $fields = [
        'name',
        'email',
        'phone',
        'code',
        'status',
        'profile_image_url',
    ];

    public function model()
    {
        return User::class;
    }

    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($request)
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request)
    {
        DB::beginTransaction();

        try {

            $user = $this->model->create([
                'name' => $request->name,
                'email' => $request->email,
                'code' => $request->code,
                'phone' => $request->phone,
                'coins' => 5,
                'password' => Hash::make($request->password),
            ]);

            if ($request->file('profile_image')) {
                $media = $user->addMediaFromRequest('profile_image')->toMediaCollection('profile_image');
                $user->profile_image_url = $media->getFullUrl();
                $user->save();
            }

            DB::commit();

            return redirect()->route('user.index')->with('message', __('static.response.user_created_successfully'));
        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update($request, $id)
    {
        DB::beginTransaction();
        try {

            $userDetails = $this->model->find($id);

            if ($request->file('profile_image')) {
                $userDetails->clearMediaCollection('profile_image');
                $media = $userDetails->addMediaFromRequest('profile_image')->toMediaCollection('profile_image');
                $userDetails->profile_image_url = $media->getFullUrl();
                $userDetails->save();
            }

            $this->model->findOrFail($id)->update($request->all());

            DB::commit();

            return redirect()->route('user.index')->with('message', __('static.response.user_updated_successfully'));
        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function status($request, $id)
    {
        DB::beginTransaction();
        try {

            $user = $this->model->findOrFail($id);
            $user->update(['status' => $request->status]);

            DB::commit();
        } catch (Exception $e) {

            DB::rollback();
            throw $e;
        }
    }

    /**
     * Update Password
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request, $id)
    {
        DB::beginTransaction();

        try {

            $this->model->find($id)->update(['password' => Hash::make($request->new_password)]);

            DB::commit();

            return redirect()->route('user.index')->with('message', __('static.response.password_change_successfully'));
        } catch (\Exception $e) {

            DB::rollback();

            throw $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        DB::beginTransaction();

        try {

            $user = $this->model->findOrFail($user->id);
            $user->forceDelete($user->id);

            DB::commit();

            return redirect()->route('user.index')->with('message', __('static.response.user_deleted_successfully'));
        } catch (\Exception $e) {

            DB::rollback();

            throw $e;
        }
    }
}
