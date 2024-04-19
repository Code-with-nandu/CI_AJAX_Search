<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AjaxSearchController extends CI_Controller {


	public function index()
	{
		$this->load->view('ajaxsearchView');
	}
	public function fetch()
	{
		$output = '';
		$query = '';
		$this->load->model('ajaxsearch_model');
		if($this->input->post('query'))
		{
			$query = $this->input->post('query');
		}
		$data = $this ->ajaxsearch_model->fetch_data($query);
		
		$output.='
		
		<div class="table-responsive">
		<table class="table table-bordered table-striped"
		<thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Notes</th>
                    <th>Token</th>
                    <th>Password</th>
                </tr>
            </thead>
		';
		if($data->num_rows()>0)
		{
			foreach($data->result() as $row)
			{
				
				$output .='
				<tr>
					<td>'.$row->id.'</td>
					<td>'.$row->first_name.'</td>
					<td>'.$row->last_name.'</td>
					<td>'.$row->mobile.'</td>
					<td>'.$row->email.'</td>
					<td>'.$row->notes.'</td>
					<td>'.$row->token.'</td>
					<td>'.$row->password.'</td>
				</tr>
				';
			}

		}
		else
		{
			$output .='<tr> <td colspan ="5">No Data Found </td> </tr>';
		}
		$output.='</table>';
		echo $output;
	}
}
