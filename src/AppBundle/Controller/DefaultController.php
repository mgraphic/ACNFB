<?php

namespace AppBundle\Controller;

use AppBundle\Report\ReportManager;
use AppBundle\Repository\Lookup;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * Get event info by Event ID
     * 
     * @Route(
     *     "/report/{source}",
     *     name="report_api",
     *     requirements={
     *         "source": "Hilton|Hyatt|Marriott"
     *     }
     * )
     * @Method({"GET"})
     */
    public function reportAction(Request $request, $source)
    {
        $repoitory = $this->getRepository($source);
        $from = new \DateTime($request->query->get('from'));
        $to = new \DateTime($request->query->get('to'));

        $results = $repoitory->getRoomsSoldByDateRange($from, $to);

        $report = new ReportManager($results);

        $reportData = $report->getReportData();

        $reportData['dateRange'] = [
            'from' => $from->format('c'),
            'to' => $to->format('c')
        ];

        $response = new Response;
        $response->setContent($this->getJson($reportData));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * Get JSON formatted string of result array
     * 
     * @param array $array
     * @return string
     */
    protected function getJson(array $array)
    {
        return json_encode($array);
    }

    /**
     * Get AppBundle\Repository\Lookup object
     * 
     * @param string $source
     * @return Lookup
     */
    protected function getRepository($source)
    {
        return new Lookup($source);
    }
}
