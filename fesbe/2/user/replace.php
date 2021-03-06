<?
//echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";


  function acento($string)

    {
       $string = str_replace('&aacute;' , 'á' , $string );
       $string = str_replace('&Aacute;' , 'Á' ,$string );
       $string = str_replace('&acirc;'  , 'â' , $string );
       $string = str_replace('&Acirc;'  , 'Â' , $string );
       $string = str_replace('&agrave;' , 'à' , $string );
       $string = str_replace('&Agrave;' , 'À' , $string );
       $string = str_replace('&atilde;' , 'ã' , $string );
       $string = str_replace('&Atilde;' , 'Ã' , $string );
       $string = str_replace('&ccedil;' , 'ç' , $string );
       $string = str_replace('&Ccedil;' , 'Ç' , $string );
       $string = str_replace('&eacute;' , 'é' , $string );
       $string = str_replace('&Eacute;' , 'É' , $string );
       $string = str_replace('&ecirc;'  , 'ê' , $string );
       $string = str_replace('&Ecirc;'  , 'Ê' , $string );
       $string = str_replace('&Eacute;' , 'È' , $string );
       $string = str_replace('&eacute;' , 'è' , $string );
       $string = str_replace('&iacute;','í' , $string );
       $string = str_replace('&Iacute;' , 'Í' , $string );
       $string = str_replace('&oacute;' , 'ó' , $string );
       $string = str_replace('&Oacute;' , 'Ó' , $string );
       $string = str_replace('&ocirc;'  , 'ô' , $string );
       $string = str_replace('&Ocirc;'  , 'Ô' , $string );
       $string = str_replace('&otilde;' , 'õ' , $string );
       $string = str_replace('&Otilde;' , 'Õ' , $string );
       $string = str_replace('&uacute;' , 'ú' , $string );
       $string = str_replace('&Uacute;' , 'Ú' , $string );
       $string = str_replace('&uuml;'   , 'ü' , $string );
       $string = str_replace('&Uuml;'   , 'Ü' , $string );
       $string = str_replace('&deg;'   , 'º' , $string );  
       $string = str_replace('&ordm;'   , 'º' , $string ); 		            
       $string = str_replace('&deg;'   , 'ª' , $string );                       
       $string = str_replace('&gt;'   , '>' , $string );  
       $string = str_replace('&lt;'   , '<' , $string );
       $string = str_replace('&sup1;'   , '¹' , $string );
       $string = str_replace('&sup2;'   , '²' , $string );
       $string = str_replace('&sup3;'   , '³' , $string );
	   $string = str_replace('&nbsp;'   , ' ' , $string );
$string = str_replace('&sup1;'  , '¹', $string );
$string = str_replace('&sup2;'  , '²', $string );
$string = str_replace('&sup3;'  , '³', $string );
$string = str_replace('&frac12;'  , '½', $string );
$string = str_replace('&frac14;'  , '¼', $string );
$string = str_replace('&frac34;'  , '¾', $string );
$string = str_replace('&gt;'  , '>', $string );
$string = str_replace('&lt;'  , '<', $string );
$string = str_replace('&plusmn;'  , '±', $string );
$string = str_replace('&minus;'  , '−', $string );
$string = str_replace('&times;'  , '×', $string );
$string = str_replace('&divide;'  , '÷', $string );
$string = str_replace('&lowast;'  , '∗', $string );
$string = str_replace('&frasl;'  , '⁄', $string );
$string = str_replace('&permil;'  , '‰', $string );
$string = str_replace('&int;'  , '∫', $string );
$string = str_replace('&sum;'  , '∑', $string );
$string = str_replace('&prod;'  , '∏', $string );
$string = str_replace('&radic;'  , '√', $string );
$string = str_replace('&infin;'  , '∞', $string );
$string = str_replace('&asymp;'  , '≈', $string );
$string = str_replace('&cong;'  , '≅', $string );
$string = str_replace('&prop;'  , '∝', $string );
$string = str_replace('&equiv;'  , '≡', $string );
$string = str_replace('&ne;'  , '≠', $string );
$string = str_replace('&le;'  , '≤', $string );
$string = str_replace('&ge;'  , '≥', $string );
$string = str_replace('&there4;'  , '∴', $string );
$string = str_replace('&sdot;'  , '⋅', $string );
$string = str_replace('&middot;'  , '·', $string );
$string = str_replace('&part;'  , '∂', $string );
$string = str_replace('&image;'  , 'ℑ', $string );
$string = str_replace('&real;'  , 'ℜ', $string );
//$string = str_replace('&prime;'  , '′', $string );
//$string = str_replace('&Prime;'  , '"', $string );
$string = str_replace('&deg;'  , '°', $string );
$string = str_replace('&ang;'  , '∠', $string );
$string = str_replace('&perp;'  , '⊥', $string );
$string = str_replace('&nabla;'  , '∇', $string );
$string = str_replace('&oplus;'  , '⊕', $string );
$string = str_replace('&otimes;'  , '⊗', $string );
$string = str_replace('&alefsym;'  , 'ℵ', $string );
$string = str_replace('&oslash;'  , 'ø', $string );
$string = str_replace('&Oslash;'  , 'Ø', $string );
$string = str_replace('&isin;'  , '∈', $string );
$string = str_replace('&notin;'  , '∉', $string );
$string = str_replace('&cap;'  , '∩', $string );
$string = str_replace('&cup;'  , '∪', $string );
$string = str_replace('&sub;'  , '⊂', $string );
$string = str_replace('&sup;'  , '⊃', $string );
$string = str_replace('&sube;'  , '⊆', $string );
$string = str_replace('&supe;'  , '⊇', $string );
$string = str_replace('&exist;'  , '∃', $string );
$string = str_replace('&forall;'  , '∀', $string );
$string = str_replace('&empty;'  , '∅', $string );
$string = str_replace('&not;'  , '¬', $string );
$string = str_replace('&and;'  , '∧', $string );
$string = str_replace('&or;'  , '∨', $string );
$string = str_replace('&crarr;'  , '↵', $string );
$string = str_replace('&larr; e &rarr;'  , '← e →', $string );
$string = str_replace('&uarr; e &darr;'  , '↑ e ↓', $string );
$string = str_replace('&harr;'  , '↔', $string );
$string = str_replace('&lArr; e &hrrr;'  , '⇐ e ⇒', $string );
$string = str_replace('&uArr; e &dArr;'  , '⇑ e ⇓', $string );
$string = str_replace('&hArr;'  , '⇔', $string );
$string = str_replace('&lceil; e &rceil;'  , '⌈ e ⌉', $string );
$string = str_replace('&lfloor; e &rfloor;'  , '⌊ e ⌋', $string );
$string = str_replace('&loz;'  , '◊', $string );
$string = str_replace('&ntilde;'  , 'ñ', $string );
$string = str_replace('&auml;'  , 'ä', $string );
$string = str_replace('&euml;'  , 'ë', $string );
$string = str_replace('&iuml;'  , 'ï', $string );
$string = str_replace('&icirc;'  , 'î', $string );
$string = str_replace('&ouml;'  , 'ö', $string );
$string = str_replace('&ugrave;'  , 'ù', $string );
$string = str_replace('&yacute;'  , 'ý', $string );
$string = str_replace('&aelig;'  , 'æ', $string );
$string = str_replace('&dagger;'  , '†', $string );
$string = str_replace('&thorn;'  , 'þ', $string );
$string = str_replace('&sect;'  , '§', $string );
$string = str_replace('&Ntilde;'  , 'Ñ', $string );
$string = str_replace('&Auml;'  , 'Ä', $string );
$string = str_replace('&Euml;'  , 'Ë', $string );
$string = str_replace('&Iuml;'  , 'Ï', $string );
$string = str_replace('&Icirc;'  , 'Î', $string );
$string = str_replace('&Ouml;'  , 'Ö', $string );
$string = str_replace('&Ugrave;'  , 'Ù', $string );
$string = str_replace('&Yacute;'  , 'Ý', $string );
$string = str_replace('&AElig;'  , 'Æ', $string );
$string = str_replace('&Dagger;'  , '‡', $string );
$string = str_replace('&THORN;'  , 'Þ', $string );
$string = str_replace('&fnof;'  , 'ƒ', $string );
$string = str_replace('&iexcl;'  , '¡', $string );
$string = str_replace('&aring;'  , 'å', $string );
$string = str_replace('&grave;'  , 'è', $string );
$string = str_replace('&igrave;'  , 'ì', $string );
$string = str_replace('&ograve;'  , 'ò', $string );
$string = str_replace('&ucirc;'  , 'û', $string );
$string = str_replace('&yuml;'  , 'ÿ', $string );
$string = str_replace('&oelig;'  , 'œ', $string );
$string = str_replace('&scaron;'  , 'š', $string );
$string = str_replace('&eth;'  , 'ð', $string );
$string = str_replace('&szlig;'  , 'ß', $string );
$string = str_replace('&Ograve;'  , 'Ò', $string );
$string = str_replace('&Ucirc;'  , 'Û', $string );
$string = str_replace('&Yuml;'  , 'Ÿ', $string );
$string = str_replace('&OElig;'  , 'Œ', $string );
$string = str_replace('&Scaron;'  , 'Š', $string );
$string = str_replace('&ETH;'  , 'Ð', $string );
$string = str_replace('&micro;'  , 'µ', $string );
$string = str_replace('&iquest;'  , '¿', $string );
$string = str_replace('&Aring;'  , 'Å', $string );
$string = str_replace('&Egrave;'  , 'È', $string );
$string = str_replace('&Igrave;'  , 'Ì', $string );
$string = str_replace('&alpha;'  , 'α', $string );
$string = str_replace('&gamma;'  , 'γ', $string );
$string = str_replace('&epsilon;'  , 'ε', $string );
$string = str_replace('&eta;'  , 'η', $string );
$string = str_replace('&iota;'  , 'ι', $string );
$string = str_replace('&lambda;'  , 'λ', $string );
$string = str_replace('&nu;'  , 'ν', $string );
$string = str_replace('&omicron;'  , 'ο', $string );
$string = str_replace('&rho;'  , 'ρ', $string );
$string = str_replace('&sigmaf;'  , 'ς', $string );
$string = str_replace('&Upsilon;'  , 'Υ', $string );
$string = str_replace('&Chi;'  , 'Χ', $string );
$string = str_replace('&Omega;'  , 'Ω', $string );
$string = str_replace('&Alpha;'  , 'Α', $string );
$string = str_replace('&Gamma;'  , 'Γ', $string );
$string = str_replace('&Epsilon;'  , 'Ε', $string );
$string = str_replace('&Eta;'  , 'Η', $string );
$string = str_replace('&Iota;'  , 'Ι', $string );
$string = str_replace('&Lambda;'  , 'Λ', $string );
$string = str_replace('&Nu;'  , 'Ν', $string );
$string = str_replace('&Omicron;'  , 'Ο', $string );
$string = str_replace('&Rho;'  , 'Ρ', $string );
$string = str_replace('&tau;'  , 'τ', $string );
$string = str_replace('&phi;'  , 'φ', $string ); 
$string = str_replace('&psi;'  , 'ψ', $string );
$string = str_replace('&thetasym;'  , 'ϑ', $string );
$string = str_replace('&beta;'  , 'β', $string );
$string = str_replace('&delta;'  , 'δ', $string );
$string = str_replace('&zeta;'  , 'ζ', $string );
$string = str_replace('&theta;'  , 'θ', $string );
$string = str_replace('&kappa;'  , 'κ', $string );
$string = str_replace('&mu;'  , 'µ', $string );
$string = str_replace('&xi;'  , 'ξ', $string );
$string = str_replace('&pi;'  , 'π', $string );
$string = str_replace('&sigma;'  , 'σ', $string );
$string = str_replace('&Tau;'  , 'Τ', $string );
$string = str_replace('&Phi;'  , 'Φ', $string );
$string = str_replace('&Psi;'  , 'Ψ', $string );
$string = str_replace('&upsih;'  , 'ϒ', $string );
$string = str_replace('&Beta;'  , 'Β', $string );
$string = str_replace('&Delta;'  , 'Δ', $string );
$string = str_replace('&Zeta;'  , 'Ζ', $string );
$string = str_replace('&Theta;'  , 'Θ', $string );
$string = str_replace('&Kappa;'  , 'Κ', $string );
$string = str_replace('&Mu;'  , 'Μ', $string );
$string = str_replace('&Xi;'  , 'Ξ', $string );
$string = str_replace('&Pi;'  , 'Π', $string );
$string = str_replace('&Sigma;'  , 'Σ', $string );
$string = str_replace('&upsilon;'  , 'υ', $string );
$string = str_replace('&chi;'  , 'χ', $string );
$string = str_replace('&omega;'  , 'ω', $string );
$string = str_replace('&piv;'  , 'ϖ', $string );
$string = str_replace('&ldquo;'  , '"', $string );
$string = str_replace('&rdquo;'  , '"', $string );
$string = str_replace('&#913;','Alpha',$string);
$string = str_replace('&#914;','Beta',$string);
$string = str_replace('&#915;','Gamma',$string);
$string = str_replace('&#916;','Delta',$string);
$string = str_replace('&#917;','Epsilon',$string);
$string = str_replace('&#918;','Zeta',$string);
$string = str_replace('&#919;','Eta',$string);
$string = str_replace('&#920;','Theta',$string);
$string = str_replace('&#921;','Iota',$string);
$string = str_replace('&#922;','Kappa',$string);
$string = str_replace('&#923;','Lambda',$string);
$string = str_replace('&#924;','Mu',$string);
$string = str_replace('&#925;','Nu',$string);
$string = str_replace('&#926;','Xi',$string);
$string = str_replace('&#927;','Omicron',$string);
$string = str_replace('&#928;','Pi',$string);
$string = str_replace('&#929;','Rho',$string);
$string = str_replace('&#931;','Sigma',$string);
$string = str_replace('&#932;','Tau',$string);
$string = str_replace('&#933;','Upsilon',$string);
$string = str_replace('&#934;','Phi',$string);
$string = str_replace('&#935;','Chi',$string);
$string = str_replace('&#936;','Psi',$string);
$string = str_replace('&#937;','Omega',$string);
$string = str_replace('&#945;','alpha',$string);
$string = str_replace('&#946;','beta',$string);
$string = str_replace('&#947;','gamma',$string);
$string = str_replace('&#948;','delta',$string);
$string = str_replace('&#949;','epsilon',$string);
$string = str_replace('&#950;','zeta',$string);
$string = str_replace('&#951;','eta',$string);
$string = str_replace('&#952;','theta',$string);
$string = str_replace('&#953;','iota',$string);
$string = str_replace('&#954;','kappa',$string);
$string = str_replace('&#955;','lambda',$string);
$string = str_replace('&#956;','mu',$string);
$string = str_replace('&#957;','nu',$string);
$string = str_replace('&#958;','xi',$string);
$string = str_replace('&#959;','omicron',$string);
$string = str_replace('&#960;','pi',$string);
$string = str_replace('&#961;','rho',$string);
$string = str_replace('&#962;','sigmaf',$string);
$string = str_replace('&#963;','sigma',$string);
$string = str_replace('&#964;','tau',$string);
$string = str_replace('&#965;','upsilon',$string);
$string = str_replace('&#966;','phi',$string);
$string = str_replace('&#967;','chi',$string);
$string = str_replace('&#968;','psi',$string);
$string = str_replace('&#969;','omega',$string);
$string = str_replace('&#977;','thetasym',$string);
$string = str_replace('&#978;','upsih',$string);
$string = str_replace('&#982;','piv',$string);

$string = str_replace('&#913;','Α',$string);
$string = str_replace('&#914;','Β',$string);
$string = str_replace('&#915;','Γ',$string);
$string = str_replace('&#916;','Δ',$string);
$string = str_replace('&#917;','Ε',$string);
$string = str_replace('&#918;','Ζ',$string);
$string = str_replace('&#919;','Η',$string);
$string = str_replace('&#920;','Θ',$string);
$string = str_replace('&#921;','Ι',$string);
$string = str_replace('&#922;','Κ',$string);
$string = str_replace('&#923;','Λ',$string);
$string = str_replace('&#924;','Μ',$string);
$string = str_replace('&#925;','Ν',$string);
$string = str_replace('&#926;','Ξ',$string);
$string = str_replace('&#927;','Ο',$string);
$string = str_replace('&#928;','Π',$string);
$string = str_replace('&#929;','Ρ',$string);
$string = str_replace('&#931;','Σ',$string);
$string = str_replace('&#932;','Τ',$string);
$string = str_replace('&#933;','Υ',$string);
$string = str_replace('&#934;','Φ',$string);
$string = str_replace('&#935;','Χ',$string);
$string = str_replace('&#936;','Ψ',$string);
$string = str_replace('&#937;','Ω',$string);
$string = str_replace('&#945;','α',$string);
$string = str_replace('&#946;','β',$string);
$string = str_replace('&#947;','γ',$string);
$string = str_replace('&#948;','δ',$string);
$string = str_replace('&#949;','ε',$string);
$string = str_replace('&#950;','ζ',$string);
$string = str_replace('&#951;','η',$string);
$string = str_replace('&#952;','θ',$string);
$string = str_replace('&#953;','ι',$string);
$string = str_replace('&#954;','κ',$string);
$string = str_replace('&#955;','λ',$string);
$string = str_replace('&#956;','μ',$string);
$string = str_replace('&#957;','ν',$string);
$string = str_replace('&#958;','ξ',$string);
$string = str_replace('&#959;','ο',$string);
$string = str_replace('&#960;','π',$string);
$string = str_replace('&#961;','ρ',$string);
$string = str_replace('&#962;','ς',$string);
$string = str_replace('&#963;','σ',$string);
$string = str_replace('&#964;','τ',$string);
$string = str_replace('&#965;','υ',$string);
$string = str_replace('&#966;','φ',$string);
$string = str_replace('&#967;','χ',$string);
$string = str_replace('&#968;','ψ',$string);
$string = str_replace('&#969;','ω',$string);
$string = str_replace('&#977;','ϑ',$string);
$string = str_replace('&#978;','ϒ',$string);
$string = str_replace('&#982;','ϖ',$string);
$string = str_replace('&#8704;','∀',$string);
$string = str_replace('&#8706;','∂',$string);
$string = str_replace('&#8707;','∃',$string);
$string = str_replace('&#8709;','∅',$string);
$string = str_replace('&#8711;','∇',$string);
$string = str_replace('&#8712;','∈',$string);
$string = str_replace('&#8713;','∉',$string);
$string = str_replace('&#8715;','∋',$string);
$string = str_replace('&#8719;','∏',$string);
$string = str_replace('&#8721;','∑',$string);
$string = str_replace('&#8727;','∗',$string);
$string = str_replace('&#8733;','∝',$string);
$string = str_replace('&#8734;','∞',$string);
$string = str_replace('&#8736;','∠',$string);
$string = str_replace('&#8743;','∧',$string);
$string = str_replace('&#8744;','∨',$string);
$string = str_replace('&#8745;','∩',$string);
$string = str_replace('&#8746;','∪',$string);
$string = str_replace('&#8747;','∫',$string);
$string = str_replace('&#8756;','∴',$string);
$string = str_replace('&#8764;','∼',$string);
$string = str_replace('&#8773;','≅',$string);
$string = str_replace('&#8776;','≈',$string);
$string = str_replace('&#8801;','≡',$string);
$string = str_replace('&#8804;','≤',$string);
$string = str_replace('&#8805;','≥',$string);
$string = str_replace('&#8834;','⊂',$string);
$string = str_replace('&#8835;','⊃',$string);
$string = str_replace('&#8836;','⊄',$string);
$string = str_replace('&#8838;','⊆',$string);
$string = str_replace('&#8839;','⊇',$string);
$string = str_replace('&#8853;','⊕',$string);
$string = str_replace('&#8855;','⊗',$string);
$string = str_replace('&#8869;','⊥',$string);
$string = str_replace('&#8901;','⋅',$string);
$string = str_replace('&#188;','¼',$string);
$string = str_replace('&#189;','½',$string);
$string = str_replace('&#190;','¾',$string);
$string = str_replace('&#178;','²',$string);
$string = str_replace('&#179;','³',$string);
$string = str_replace('&#60;','<',$string);
$string = str_replace('&#8804;','≤',$string);
$string = str_replace('&#62;','>',$string);
$string = str_replace('&#8805;','≥',$string);
$string = str_replace('&#172;','¬',$string);
$string = str_replace('&#8722;','−',$string);
$string = str_replace('&#43;','+',$string);
$string = str_replace('&#215;','×',$string);
$string = str_replace('&#247;','÷',$string);
$string = str_replace('&#61;','=',$string);
$string = str_replace('&#8800;',utf8_decode('≠'),$string);
$string = str_replace('&#402;','ƒ',$string);
$string = str_replace('&#177;','±',$string);
$string = str_replace('&#8730;','√',$string);
$string = str_replace('&#8260;','⁄',$string);
$string = str_replace('&#8472;','℘',$string);
$string = str_replace('&#8465;','ℑ',$string);
$string = str_replace('&#8476;','ℜ',$string);
$string = str_replace('&#8501;','ℵ',$string);
$string = str_replace('&#8968;','⌈',$string);
$string = str_replace('&#8969;','⌉',$string);
$string = str_replace('&#8970;','⌊',$string);
$string = str_replace('&#8971;','⌋',$string);
$string = str_replace('&#9001;','⟨',$string);
$string = str_replace('&#9002;','⟩',$string);
$string = str_replace('&#8592;','←',$string);
$string = str_replace('&#8593;','↑',$string);
$string = str_replace('&#8594;','→',$string);
$string = str_replace('&#8595;','↓',$string);
$string = str_replace('&#8596;','↔',$string);
$string = str_replace('&#8629;','↵',$string);
$string = str_replace('&#8656;','⇐',$string);
$string = str_replace('&#8657;','⇑',$string);
$string = str_replace('&#8658;','⇒',$string);
$string = str_replace('&#8659;','⇓',$string);
$string = str_replace('&#8660;','⇔',$string);
$string = str_replace('&#192;','À',$string);
$string = str_replace('&#193;','Á',$string);
$string = str_replace('&#194;','Â',$string);
$string = str_replace('&#195;','Ã',$string);
$string = str_replace('&#196;','Ä',$string);
$string = str_replace('&#197;','Å',$string);
$string = str_replace('&#198;','Æ',$string);
$string = str_replace('&#199;','Ç',$string);
$string = str_replace('&#200;','È',$string);
$string = str_replace('&#201;','É',$string);
$string = str_replace('&#202;','Ê',$string);
$string = str_replace('&#203;','Ë',$string);
$string = str_replace('&#204;','Ì',$string);
$string = str_replace('&#205;','Í',$string);
$string = str_replace('&#206;','Î',$string);
$string = str_replace('&#207;','Ï',$string);
$string = str_replace('&#208;','Ð',$string);
$string = str_replace('&#209;','Ñ',$string);
$string = str_replace('&#210;','Ò',$string);
$string = str_replace('&#211;','Ó',$string);
$string = str_replace('&#212;','Ô',$string);
$string = str_replace('&#213;','Õ',$string);
$string = str_replace('&#214;','Ö',$string);
$string = str_replace('&#216;','Ø',$string);
$string = str_replace('&#338;','Œ',$string);
$string = str_replace('&#352;','Š',$string);
$string = str_replace('&#217;','Ù',$string);
$string = str_replace('&#218;','Ú',$string);
$string = str_replace('&#219;','Û',$string);
$string = str_replace('&#220;','Ü',$string);
$string = str_replace('&#221;','Ý',$string);
$string = str_replace('&#376;','Ÿ',$string);
$string = str_replace('&#222;','Þ',$string);
$string = str_replace('&#223;','ß',$string);
$string = str_replace('&#224;','à',$string);
$string = str_replace('&#225;','á',$string);
$string = str_replace('&#226;','â',$string);
$string = str_replace('&#227;','ã',$string);
$string = str_replace('&#228;','ä',$string);
$string = str_replace('&#229;','å',$string);
$string = str_replace('&#230;','æ',$string);
$string = str_replace('&#231;','ç',$string);
$string = str_replace('&#232;','è',$string);
$string = str_replace('&#233;','é',$string);
$string = str_replace('&#234;','ê',$string);
$string = str_replace('&#235;','ë',$string);
$string = str_replace('&#236;','ì',$string);
$string = str_replace('&#237;','í',$string);
$string = str_replace('&#238;','î',$string);
$string = str_replace('&#239;','ï',$string);
$string = str_replace('&#240;','ð',$string);
$string = str_replace('&#241;','ñ',$string);
$string = str_replace('&#242;','ò',$string);
$string = str_replace('&#243;','ó',$string);
$string = str_replace('&#244;','ô',$string);
$string = str_replace('&#245;','õ',$string);
$string = str_replace('&#246;','ö',$string);
$string = str_replace('&#248;','ø',$string);
$string = str_replace('&#339;','œ',$string);
$string = str_replace('&#353;','š',$string);
$string = str_replace('&#249;','ù',$string);
$string = str_replace('&#250;','ú',$string);
$string = str_replace('&#251;','û',$string);
$string = str_replace('&#252;','ü',$string);
$string = str_replace('&#253;','ý',$string);
$string = str_replace('&#255;','ÿ',$string);
$string = str_replace('&#254;','þ',$string);
$string = str_replace('&#160;',' ',$string);
$string = str_replace('&#38;','&',$string);
$string = str_replace('&#166;','¦',$string);
$string = str_replace('&#167;','§',$string);
$string = str_replace('&#168;','¨',$string);
$string = str_replace('&#169;','©',$string);
$string = str_replace('&#174;','®',$string);
$string = str_replace('&#8482;','™',$string);
$string = str_replace('&#170;','ª',$string);
$string = str_replace('&#186;','º',$string);
$string = str_replace('&#175;','¯',$string);
$string = str_replace('&#176;','°',$string);
$string = str_replace('&#185;','¹',$string);
$string = str_replace('&#178;','²',$string);
$string = str_replace('&#179;','³',$string);
$string = str_replace('&#180;','´',$string);
$string = str_replace('&#181;','µ',$string);
$string = str_replace('&#182;','¶',$string);
$string = str_replace('&#183;','·',$string);
$string = str_replace('&#184;','¸',$string);
$string = str_replace('&#8224;','†',$string);
$string = str_replace('&#8225;','‡',$string);
$string = str_replace('&#8240;','‰',$string);
$string = str_replace('&#710;','ˆ',$string);
$string = str_replace('&#732;','˜',$string);
$string = str_replace('&#8226;','•',$string);
$string = str_replace('&#8230;','…',$string);
$string = str_replace('&#9674;','◊',$string);
$string = str_replace('&#9824;','♠',$string);
$string = str_replace('&#9827;','♣',$string);
$string = str_replace('&#9829;','♥',$string);
$string = str_replace('&#9830;','♦',$string);
$string = str_replace('&#161;','¡',$string);
$string = str_replace('&#171;','«',$string);
$string = str_replace('&#187;','»',$string);
$string = str_replace('&#191;','¿',$string);
$string = str_replace('&#8211;','–',$string);
$string = str_replace('&#8212;','—',$string);
$string = str_replace('&#8249;','‹',$string);
$string = str_replace('&#8250;','›',$string);
$string = str_replace('&#8242;','′',$string);
$string = str_replace('&#8243;','″',$string);
$string = str_replace('&#8254;','‾',$string);
$string = str_replace('&#164;','¤',$string);
$string = str_replace('&#162;','¢',$string);
$string = str_replace('&#36;','$',$string);
$string = str_replace('&#163;','£',$string);
$string = str_replace('&#165;','¥',$string);
$string = str_replace('&#128;','€',$string);
$string = str_replace('&#8355;','₣',$string);
$string = str_replace('&#8356;','₤',$string);
$string = str_replace('&#8359;','₧',$string);

       return $string;

    }


 

?>