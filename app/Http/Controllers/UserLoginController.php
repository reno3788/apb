<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
// use App\Models\UserLogin;
use Illuminate\Support\Facades\DB;

class UserLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $HOST=config('sybase.url');//config('APP_NAME','test');
        $DBNAME=config('sybase.database');
        $USER=config('sybase.username');
        $PASW=config('sybase.password');
        // $PDO = new \PDO("dblib:host=192.168.0.103:3737;dbname=pml", "dba", "orlansoft10");
        $PDO = new \PDO("dblib:host=". $HOST.";dbname=".$DBNAME,$USER, $PASW);
        $QUERY = $PDO->prepare('SELECT  * FROM vinvoicetopay');
        $QUERY->execute();
        $user = $QUERY->fetchAll(\PDO::FETCH_OBJ);
        return compact('user');
        //return "dblib:host=". $HOST.";dbname=".$DBNAME.$USER.$PASW;
        // return view(‘user.index’, compact(‘user ‘));
        // $userlogins = UserLogin::all();
        // return view('userlogin/index',compact('userlogins'));
        // print_r PDO::getAvailableDrivers()

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
