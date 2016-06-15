<?php
namespace Cupon\OfertaBundle\Twig\Extension;

class CuponExtension extends \Twig_Extension
{
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('descuento', array($this, 'getDescuento')),
        );
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('mostrar_como_lista',
                array($this,'mostrarComoLista'),
                array('is_safe' => array('html'))
            ),
            new \Twig_SimpleFilter('cuenta_atras',
                array($this, 'cuentaAtras'),
                array('is_safe' => array('html'))
            )
        );
    }

    public function getDescuento($precio, $descuento, $decimales = 0)
    {
        if (!is_numeric($precio) || !is_numeric($descuento))
        {
            return '-';
        }

        if ($descuento == 0 || $descuento == null)
        {
            return '0%';
        }

        $precio_original = $precio + $descuento;
        $porcentaje = ($descuento / $precio_original)*100;
        $ofertaDescuento = '-'.number_format($porcentaje, $decimales).'%';
        return $ofertaDescuento;
    }

    public function mostrarComoLista($value, $tipo)
    {
        $html = "<".$tipo.">\n";
        $html .= "<li>".str_replace("\n","</li>\n<li>", $value)."</li>\n";
        $html .= "</".$tipo.">\n";

        return $html;
    }

    public function cuentaAtras($fecha)
    {
        $fecha = $fecha->format('Y').($fecha->format('m')-1).$fecha->format(',d,H,i,s');
        $html = <<<EOJ
        <script type="text/javascript">
            function calcularCuentaAtras($fecha)
            {
                var horas, minutos, segundos;
                var ahora = new Date();
                var fechaExpiracion = new Date($fecha);
                var falta = Math.Floor( (fechaExpiracion.getTime() - ahora.getTime()) / 1000);
                
                if (falta < 0)
                {
                    cuentaAtras = '-';
                }else{
                    horas = Math.floor(falta/3600);
                    falta = falta % 3600;
                    
                    minutos = Math.floor(falta/60);
                    falta = falta % 60;
                    
                    segundos = Math.floor(falta);
                    
                    cuentaAtras = (horas < 10 ? '0' + horas : horas) + 'h'
                                    +(minutos < 10 ? '0' + minutos : minutos) + 'm'
                                    +(segundos < 10 ? '0' + segundos : segundos) + 's';
                                    
                    setTimeout('calcularCuentaAtras()', 1000);
                }
                document.getElementById('tiempo').innerHTML = '<strong>Faltan:</strong>'+cuentaAtras;
            }
            
        calcularCuentaAtras();
        </script>
EOJ;

        return $html;

    }

    public function getName(){
        return 'cupon';
    }
}