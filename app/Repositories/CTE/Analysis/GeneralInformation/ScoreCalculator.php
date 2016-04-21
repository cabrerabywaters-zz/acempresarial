<?php 
namespace acempresarial\Repositories\CTE\Analysis;

/**
* El puntaje determina el segmento al que pertenece una 
* empresa, se utiliza el último formulario F22 cargado y 
* la UF del periodo anual correspondiente.
*
* 
*/
class ScoreCalculator 
{
	public function get()
	{
		$this->recipe()
	}
	
	private function recipe()
	{
		/*
		 100*( 0.3 * ($C628/$UF) / 88078  + 0.2 * ($C122/$UF) / 117437 + 0.5 *( 0.046*( ($C628/$UF) /1000)*2 + 0.001*(($C122/$UF)/1000)*2+ 3.382  )/250)
		*/
	}
	
}