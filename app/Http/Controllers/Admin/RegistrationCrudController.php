<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RegistrationRequest;
use App\Mail\AttendanceConfirmationMail;
use App\Mail\AttandanceMarkdownMail;
use App\Models\Registration;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

/**
 * Class RegistrationCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class RegistrationCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;

    //use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    //use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Registration::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/registration');
        CRUD::setEntityNameStrings('registration', 'registrations');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {

        $this->crud->addButtonFromView('top', 'send-confirmation-email', 'attendance-confirmation-email');

        CRUD::column('full_name');
        CRUD::column('email');
        CRUD::column('phone_number');
        CRUD::column('category');
        CRUD::column('profession');
        CRUD::column('programing_level');
        CRUD::column('workshops');
        $this->crud->addColumn([
            'name' => 'is_accepted',
            'label' => 'is Accepted', // Table column heading
            'type' => 'model_function',
            'function_name' => 'isAccepted',
        ]);

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    protected function setupShowOperation()
    {

        CRUD::column('full_name');
        CRUD::column('email');
        CRUD::column('phone_number');
        CRUD::column('category');
        CRUD::column('profession');
        CRUD::column('programing_level');
        CRUD::column('workshops');
        $this->crud->addColumn([
            'name' => 'is_accepted',
            'label' => 'is Accepted', // Table column heading
            'type' => 'model_function',
            'function_name' => 'isAccepted',
        ],);


        $this->crud->addButtonFromModelFunction('line', 'refuse_student', 'refuseStudent', 'beginning');
        $this->crud->addButtonFromModelFunction('line', 'accept_student', 'acceptStudent', 'beginning');
    }


    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(RegistrationRequest::class);

        CRUD::field('student_full_name');
        CRUD::field('student_birth_date');
        CRUD::field('student_email');
        CRUD::field('student_phone_number');
        CRUD::addField([
            'name' => 'student_category',
            'label' => 'Category',
            'type' => 'enum',
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ]
        ]);
        CRUD::addField([
            'name' => 'student_programing_level',
            'label' => 'Programing level',
            'type' => 'enum',
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ]
        ]);
        CRUD::field('student_photo');

        $this->crud->addButtonFromModelFunction('line', 'refuse_student', 'refuseStudent', 'beginning');
        $this->crud->addButtonFromModelFunction('line', 'accept_student', 'acceptStudent', 'beginning');


        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function addRegistration(Request $request)
    {
        $data = $request->all();
        $data["is_accepted"] = false;
        $result = Registration::create($data);
        return response()->json([
            "success" => true,
            "message" => "Registration successfully, thank you and we will contact you soon."
        ]);
    }

    public function acceptStudent($id)
    {
        $data["is_accepted"] = true;
        Registration::where('id', $id)->update($data);
        \Alert::add('success', "Student Accpted Succefully")->flash();
        return redirect()->back();
    }

    public function refuseStudent($id)
    {
        $data["is_accepted"] = false;
        Registration::where('id', $id)->update($data);
        \Alert::add('success', "Student Refused Succefully")->flash();
        return redirect()->back();
    }

    public function checkCategory(Request $request)
    {
        $registrations = Registration::where('student_category', '=', $request["student_category"])
            //->where("is_accepted", "=", true)
            ->get();
        $registrationsCount = $registrations->count();
        return response()->json([
            "success" => true,
            "number" => $registrationsCount
        ]);
    }

    public function sendConfirmationEmail(Request $request)
    {
        $registrations = Registration::query()->get();

        foreach ($registrations as $r) {
            $confirmation_link = URL::route('attendance.confirme', ['id' => $r->id]);
            Mail::to($r->email)->send(new AttendanceConfirmationMail($r, $confirmation_link));
        }
        \Alert::add('success', "Emails has bee sent successfully")->flash();
        return back();
    }

    public function sendConfirmationEmailSingle($id)
    {
        $registrations = Registration::query()->find($id);

        if ($registrations) {
            $confirmation_link = URL::route('attendance.confirme', ['id' => $registrations->id]);
            Mail::to($registrations->email)->send(new AttendanceConfirmationMail($registrations, $confirmation_link));
        }
        \Alert::add('success', "Emails has bee sent successfully")->flash();
        return back();
    }
}
