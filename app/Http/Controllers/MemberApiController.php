<?php

namespace App\Http\Controllers;

 use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Member;

class MemberApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = rand();
        Session::put('test',$a);
        echo Session::get('test');
        // $member = Member::all();
        // $data = $member->toArray();

        // if (empty($data)) {
        //     $response = [
        //         'success' => false,
        //         'data' => "Empty",
        //         'message' => '無任何聯絡人資料'
        //     ];
        //     return response()->json($response, 200);
        // } else {
        //     $response = [
        //         'success' => true,
        //         'data' => $member,
        //         'message' => '資料載入成功'
        //     ];
        //     return response()->json($response, 200);
        // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo Session::pull('test');
        // $member = new Member;
        // $member->name = strval($request->name);
        // $member->ename = strval($request->ename);
        // $member->phone = strval($request->phone);
        // $member->email = strval($request->email);
        // $member->sex = strval($request->sex);
        // $member->city = strval($request->city);
        // $member->township = strval($request->township);
        // $member->postcode = strval($request->postcode);
        // $member->address = strval($request->address);
        // $member->notes = strval($request->notes);
        // $member->save();
        // // return response()->json($member);
        // return response()->json(["200" => "聯絡人新增成功!", 'data' => $member]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($member_id)
    {
        $member = Member::find($member_id);
        if ($member) {
            return response()->json($member);
        } else {
            return response()->json(['查無此筆資料，操作錯誤!'], "404");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $member_id)
    {
        $member = Member::find($member_id);
        $member->name = strval($request->name);
        $member->ename = strval($request->ename);
        $member->phone = strval($request->phone);
        $member->email = strval($request->email);
        $member->sex = strval($request->sex);
        $member->city = strval($request->city);
        $member->township = strval($request->township);
        $member->postcode = strval($request->postcode);
        $member->address = strval($request->address);
        $member->notes = strval($request->notes);
        $member->save();
        // Member::find($member_id)->update($request->all());
        return response()->json(["200" => "資料編輯成功", 'data' => $member]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($member_id)
    {
        $member = Member::destroy($member_id);

        if ($member) {
            return response()->json(['刪除資料成功'], "200");
        } else {
            return response()->json(['刪除資料失敗'], "404");
        }
    }
}