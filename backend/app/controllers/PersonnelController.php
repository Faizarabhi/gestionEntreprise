    <?php
    class PersonnelController extends Controller
    {
        private $personnelModel;
        public function __construct()
        {
            $this->personnelModel = $this->model('Personnel');
        }
    }
