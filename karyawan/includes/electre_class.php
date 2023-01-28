<?php
class Electre{

	public $data;
	public $bobot;

	public $kriteria;
	public $x_jarak;
	public $normal;
	public $terbobot;
	public $concordance;
	public $discordance;
	public $m_concordance;
	public $m_discordance;
	public $t_concordance;
	public $t_discordance;
	public $md_concordance;
	public $md_discordance;
	public $agregate;
	public $total;

	function __construct($data, $bobot){
		$this->data = $data;
		$this->bobot = $bobot;

		$this->x_jarak();
		$this->normal();
		$this->terbobot();
		$this->concordance();
		$this->discordance();
		$this->m_concordance();
		$this->m_discordance();

		$this->t_concordance = $this->treshold($this->m_concordance);
		$this->t_discordance = $this->treshold($this->m_discordance);
		$this->md_concordance();
		$this->md_discordance();
		$this->agregate();
		$this->total();
		//print_r($this);
	}	
	function total(){		
		foreach($this->agregate as $key => $val){
			$this->total[$key] = array_sum($val);
		}
	}
	function agregate(){		
		foreach($this->md_concordance as $key => $val){
			foreach($val as $k => $v){
				$this->agregate[$key][$k] = $v * $this->md_discordance[$key][$k];
			}
		}
	}
	function md_discordance(){
		foreach($this->m_discordance as $key => $val){
			foreach($val as $k => $v){
				$this->md_discordance[$key][$k] = $v >= $this->t_discordance ? 1 : 0;
			}
		}
	}
	function md_concordance(){
		foreach($this->m_concordance as $key => $val){
			foreach($val as $k => $v){
				$this->md_concordance[$key][$k] = $v >= $this->t_concordance ? 1 : 0;
			}
		}
	}
	function treshold($matriks){
		$pembilang = 0;
		$count = count($matriks);
		foreach($matriks as $key => $val){
			foreach($val as $k => $v){
				if($key!=$k){
					$pembilang+=$v;
				}
			}
		}
		return $pembilang / ($count * ($count - 1));
	}
	function m_discordance(){	
		$arr = array();			
		$arr2 = array();					
		foreach($this->terbobot as $key => $val){
			foreach($this->terbobot as $k => $v){
				$arr[$key][$k] = array();
				$arr2[$key][$k] = array();
				foreach($this->kriteria as $a => $b){
					$selisih = abs($val[$a] - $v[$a]);

					if($val[$a] < $v[$a])
						$arr[$key][$k][] = $selisih;

					$arr2[$key][$k][] = $selisih;
				}
			}
		}				
		foreach($arr as $key => $val){
			foreach($val as $k => $v){				
				$this->m_discordance[$key][$k] = !$v ? 0 : max($v) / max($arr2[$key][$k]);
			}
		}	
	}
	function m_concordance(){				
		foreach($this->concordance as $key => $val){
			foreach($val as $k => $v){
				$this->m_concordance[$key][$k] = 0;
				foreach($v as $a => $b){
					$this->m_concordance[$key][$k]+=$this->bobot[$b];
				}
			}
		}			
	}
	function discordance(){				
		foreach($this->normal as $key => $val){
			foreach($this->normal as $k => $v){
				$this->discordance[$key][$k] = array();
				foreach($this->kriteria as $a => $b){
					if($val[$a] < $v[$a])
						$this->discordance[$key][$k][] = $a;
				}
			}
		}	
	}
	function concordance(){				
		foreach($this->normal as $key => $val){
			foreach($this->normal as $k => $v){
				$this->concordance[$key][$k] = array();
				foreach($this->kriteria as $a => $b){
					if($val[$a] >= $v[$a])
						$this->concordance[$key][$k][] = $a;
				}
			}
		}			
	}
	function terbobot(){		
		foreach($this->normal as $key => $val){
			foreach($val as $k => $v){				
				$this->terbobot[$key][$k] = $v * $this->bobot[$k];
			}
		}		
	}
	function normal(){		
		foreach($this->data as $key => $val){
			foreach($val as $k => $v){				
				$this->normal[$key][$k] = $v / $this->x_jarak[$k];
			}
		}				
	}
	function x_jarak(){
		$arr = array();
		foreach($this->data as $key => $val){
			foreach($val as $k => $v){				
				$arr[$k]+=$v * $v;
			}
		}		
		foreach($arr as $key => $val){
			$this->kriteria[$key] = $key;
			$this->x_jarak[$key] = sqrt($val);
		}		
	}
}