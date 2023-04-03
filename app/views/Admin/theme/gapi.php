<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript" src="http://code.highcharts.com/modules/exporting.js"></script>
<?php $datesi = date('Y-m-d',strtotime("-31 days -1 month"));
$date = explode('-',$datesi);?>
<script type="text/javascript">
var highchartsOptions = Highcharts.setOptions({
      lang: {
            loading: 'Bekleyiniz...',
            months: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'],
            weekdays: ['Pazartesi', 'Salı', 'Çarsamba', 'Perşembe', 'Cuma', 'Cum.tesi', 'Pazar'],
            shortMonths: ['Oc', 'Şub', 'Mar', 'Nis', 'May', 'Haz', 'Tem', 'Ağu', 'Eyl', 'Eki', 'Kas', 'Ark'],
            exportButtonTitle: "Exportar",
            printButtonTitle: "Imprimir",
            rangeSelectorFrom: "De",
            rangeSelectorTo: "Até",
            rangeSelectorZoom: "Periodo",
            downloadPNG: 'PNG Olarak Kaydet',
            downloadJPEG: 'JPEG olarak Kaydet',
            downloadPDF: 'PDF olarak Kaydet',
            downloadSVG: 'SVG olarak Kaydet'
            // resetZoom: "Reset",
            // resetZoomTitle: "Reset,
            // thousandsSep: ".",
            // decimalPoint: ','
            }
      }
  );
$(function () {

 
        $('#container').highcharts({
            chart: {
                type: 'area'
            },
            title: {
                text: 'Google Analitics Tekil/Çoğul Ziyaret Analitiği  '
            },
            subtitle: {
                text: 'Metric: '+
                    '  Tarih  Son 30 Gün'
            },
            xAxis: {
                 
            type: 'datetime',
            dateTimeLabelFormats: {
                day: '%e  %b'
                              }
            },
            yAxis: {
                title: {
                    text: 'Ziyaretçi Bilgileri'
                },
                labels: {
                    formatter: function() {
                        return this.value / 1 +'';
                    }
                }
            },
            tooltip: {
                pointFormat: '{series.name}   <b>{point.y:,.0f}</b> '
            },
            plotOptions: {
                area: {
                    pointStart: 1,
                    marker: {
                        enabled: false,
                        symbol: 'circle',
                        radius: 2,
                        states: {
                            hover: {
                                enabled: true
                            }
                        }
                    }
                }
            },
            series: [{
                name: 'Sayfa Gösterimi',
                data: [<?php echo $cok;?> ],
                 pointStart: Date.UTC("<?=$date[0];?>", "<?=$date[1];?>", "<?=$date[2];?>"),
            pointInterval: 24 * 3600 * 1000 // one day
            },{
                name: 'Tekil Ziyaretçi',
                data: [<?php echo $tek;?> ],
                   pointStart: Date.UTC("<?=$date[0];?>", "<?=$date[1];?>", "<?=$date[2];?>"),
            pointInterval: 24 * 3600 * 1000 // one day
            }]
 
        });
    });

Date.prototype.addDays = function (n) {
    var time = this.getTime();
    var changedDate = new Date(time + (n * 24 * 60 * 60 * 1000));
    this.setTime(changedDate.getTime());
    return this;
};

</script>
