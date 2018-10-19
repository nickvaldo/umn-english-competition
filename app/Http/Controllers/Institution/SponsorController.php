<?php
namespace App\Http\Controllers\Institution;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Model\Admin\SponsorModel as Sponsor;
use App\Http\Model\Admin\SlideModel as Slide;
use App\Http\Model\Admin\TitleModel as Title;
use App\Http\Model\Admin\RuleModel as Rule;
use App\Http\Model\Admin\LogoModel as Logo;
use App\Http\Model\Admin\InstitutionModel as Institution;
Class SponsorController extends Controller{
    public function compose(View $view){
        $sponsors = Sponsor::SelectSponsor();
        $title = Title::SelectTitle();
        $slides = Slide::SelectSlide();
        $rule = Rule::SelectRule();
        $logos = Logo::SelectLogo();
       

        $view->withLogos($logos);
        $view->withRule($rule);
        $view->withSponsors($sponsors);
        $view->withTitle($title);
        $view->withSlides($slides);
     

    }

    

    
}





?>