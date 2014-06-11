<?php
class Controller_Bloblo extends Controller_Template{

	public function action_index()
	{
		$data['bloblos'] = Model_Bloblo::find('all');
		$this->template->title = "Bloblos";
		$this->template->content = View::forge('bloblo/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('bloblo');

		if ( ! $data['bloblo'] = Model_Bloblo::find($id))
		{
			Session::set_flash('error', 'Could not find bloblo #'.$id);
			Response::redirect('bloblo');
		}

		$this->template->title = "Bloblo";
		$this->template->content = View::forge('bloblo/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Bloblo::validate('create');
			
			if ($val->run())
			{
				$bloblo = Model_Bloblo::forge(array(
				));

				if ($bloblo and $bloblo->save())
				{
					Session::set_flash('success', 'Added bloblo #'.$bloblo->id.'.');

					Response::redirect('bloblo');
				}

				else
				{
					Session::set_flash('error', 'Could not save bloblo.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Bloblos";
		$this->template->content = View::forge('bloblo/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('bloblo');

		if ( ! $bloblo = Model_Bloblo::find($id))
		{
			Session::set_flash('error', 'Could not find bloblo #'.$id);
			Response::redirect('bloblo');
		}

		$val = Model_Bloblo::validate('edit');

		if ($val->run())
		{

			if ($bloblo->save())
			{
				Session::set_flash('success', 'Updated bloblo #' . $id);

				Response::redirect('bloblo');
			}

			else
			{
				Session::set_flash('error', 'Could not update bloblo #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('bloblo', $bloblo, false);
		}

		$this->template->title = "Bloblos";
		$this->template->content = View::forge('bloblo/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('bloblo');

		if ($bloblo = Model_Bloblo::find($id))
		{
			$bloblo->delete();

			Session::set_flash('success', 'Deleted bloblo #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete bloblo #'.$id);
		}

		Response::redirect('bloblo');

	}


}
