<?php 

namespace app\Repositories\CTE\Analysis\GeneralInformation;

use acempresarial\CTE\Analysis\GeneralInformation\ScoreCalculator;
use acempresarial\CTE\Analysis\GeneralInformation\SectorRetriever;
/**
* 
*/
class ClassName extends AnotherClass
{
	private $score;
	private $sector;
	function __construct(ScoreCalculator $score, SectorRetriever $sector)
	{
		$this->score = $score;
		$this->sector = $sector;
	}

	/**
	 * This function takes the CTE and evals all the different
	 * calculations for the General information page
	 * @param  [type] $CTE [description]
	 * @return array      caculation
	 */
	public function get($CTE)
	{

		$result = array();
		$result['score'] = $this->score->get($CTE);
		$result['sector'] = $this->sector-get($CTE);

		return $result;
	}
}