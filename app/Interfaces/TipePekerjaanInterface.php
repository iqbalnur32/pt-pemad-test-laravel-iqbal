<?php

namespace App\Interfaces;

use App\Http\Requests\TipePekerjaanRequest;

interface TipePekerjaanInterface
{
    /**
     * Get all users
     * 
     * @method  GET api/users
     * @access  public
     */
    public function getAll();

    /**
     * Get User By ID
     * 
     * @param   integer     $id
     * 
     * @method  GET api/users/{id}
     * @access  public
     */
    public function getById($id);

    /**
     * Create | Update user
     * 
     * @param   \App\Http\Requests\TipePekerjaanRequest    $request
     * @param   integer                           $id
     * 
     * @method  POST    api/users       For Create
     * @method  PUT     api/users/{id}  For Update     
     * @access  public
     */
    public function requestUser(TipePekerjaanRequest $request, $id = null);

    /**
     * Delete user
     * 
     * @param   integer     $id
     * 
     * @method  DELETE  api/users/{id}
     * @access  public
     */
    public function delete($id);
}