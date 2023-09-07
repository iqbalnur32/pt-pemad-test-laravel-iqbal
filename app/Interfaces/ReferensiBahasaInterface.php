<?php

namespace App\Interfaces;

use App\Http\Requests\ReferensiBahasaRequest;

interface ReferensiBahasaInterface
{
    /**
     * Get all users
     * 
     * @method  GET pekerjaan
     * @access  public
     */
    public function getAll();

    /**
     * Get User By ID
     * 
     * @param   integer     $id
     * 
     * @method  GET pekerjaan/{id}
     * @access  public
     */
    public function getById($id);

    /**
     * Create | Update user
     * 
     * @param   \App\Http\Requests\ReferensiBahasaRequest    $request
     * @param   integer                           $id
     * 
     * @method  POST    pekerjaan       For Create
     * @method  PUT     pekerjaan/{id}  For Update     
     * @access  public
     */
    public function requestUser(ReferensiBahasaRequest $request, $id = null);

    /**
     * Delete user
     * 
     * @param   integer     $id
     * 
     * @method  DELETE  pekerjaan/{id}
     * @access  public
     */
    public function delete($id);
}