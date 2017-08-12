<?php
namespace Admin\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
class ProfileController extends AbstractActionController
{
    
    public function __construct() {
        $_SESSION['themejs'] = '<!-- Theme JS files -->
	<script type="text/javascript" src="/shop/public/assets/js/core/libraries/jasny_bootstrap.min.js"></script>
	<script type="text/javascript" src="/shop/public/assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="/shop/public/assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="/shop/public/assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="/shop/public/assets/js/plugins/ui/fullcalendar/fullcalendar.min.js"></script>
	<script type="text/javascript" src="/shop/public/assets/js/plugins/visualization/echarts/echarts.js"></script>

	<script type="text/javascript" src="/shop/public/assets/js/core/app.js"></script>
	<script type="text/javascript" src="/shop/public/assets/js/pages/user_profile_tabbed.js"></script>
	<!-- /theme JS files -->';
    }

    public function indexAction() {
        $this->layout('layout/admin');
        return new ViewModel();
    }
}
