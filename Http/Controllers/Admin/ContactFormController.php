<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\ContactForm;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ContactFormRequest;
use Gate;

class ContactFormController extends Controller
{

    public function index(Request $request)
    {
        if (Gate::none(['contact_form_allow', 'contact_form_edit'])) {
            return redirect(route("admin.home"));
        }
        $admiko_data['sideBarActive'] = "contact_form";
		$admiko_data["sideBarActiveFolder"] = "";
        
        $tableData = ContactForm::search($request->query("search"))->orderByDesc("id")->paginate($request->query("length")??array_key_first(config("admiko_config.length_menu_table")));
        return view("admin.contact_form.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['contact_form_allow'])) {
            return redirect(route("admin.contact_form.index"));
        }
        $admiko_data['sideBarActive'] = "contact_form";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.contact_form.store");
        
        
        return view("admin.contact_form.manage")->with(compact('admiko_data'));
    }

    public function store(ContactFormRequest $request)
    {
        if (Gate::none(['contact_form_allow'])) {
            return redirect(route("admin.contact_form.index"));
        }
        $data = $request->all();
        
        $ContactForm = ContactForm::create($data);
        
        return redirect(route("admin.contact_form.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $ContactForm = ContactForm::find($id);
        if (Gate::none(['contact_form_allow', 'contact_form_edit']) || !$ContactForm) {
            return redirect(route("admin.contact_form.index"));
        }

        $admiko_data['sideBarActive'] = "contact_form";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.contact_form.update", [$ContactForm->id]);
        
        
        $data = $ContactForm;
        return view("admin.contact_form.manage")->with(compact('admiko_data', 'data'));
    }

    public function update(ContactFormRequest $request,$id)
    {
        if (Gate::none(['contact_form_allow', 'contact_form_edit'])) {
            return redirect(route("admin.contact_form.index"));
        }
        $data = $request->all();
        $ContactForm = ContactForm::find($id);
        $ContactForm->update($data);
        
        return redirect(route("admin.contact_form.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['contact_form_allow'])) {
            return redirect(route("admin.contact_form.index"));
        }
        ContactForm::destroy($request->idDel);
        return back();
    }
    
    
    
}
