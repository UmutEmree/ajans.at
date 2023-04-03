<?php $con_type = array('Offline Sayfa','Kurumsal Makale','Bilgi Makaleleri','Sabit Sayfalar'); ?>
<div class="row">
                    <div class="col-md-12">
                        <div class="grid simple " style="padding-top:10px;">
                            
                           <div class="grid-title no-border"> 
                           <h3 class="content-header pull-left"><?php echo $page_label; ?></h3>
                              <div class="col-lg-5 pull-right text-right">
                        
                                 
                                <button id="editable-sample_new" class="btn btn-info tipsi"
                                       onclick="location.href='<?php echo SITE_URL ?>Admin/Content/Insert'"
                                      title="Detaylı içerik girerek oluşturmak için">
                                     İçerik Ekle <i class="fa fa-plus"></i>
                                  </button>
                                   
                            </div>
                            </div>
              
                            <div class="grid-body no-border">
                        <table class="table no-more-tables" id="dynamic-table">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>İçerik Adı </th>
                                  <th>İçerik Türü</th>
                                  <th>Ziyaret</th>
                                  <th>İşlem</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $i=1;
							 
							   foreach($content as $content_row){?>
                              <tr class=""
                              id="tr_<?php echo $content_row["Content_id"]; ?>" >
                                  <td>
                                  <?php echo $i; ?>
                                  </td>
                                  <td>
                               <?php echo $content_row["Content_Name"]; ?>
                              </td>
                                  <td> 
                                     <?php $indis =$content_row["Content_Type"];  echo $con_type[$indis]; ?>
                                  </td>
                                  <td><?php echo $content_row["Content_count"]; ?></td>
                                 
            
            <td>
<a href="<?php echo SITE_URL ?>Admin/Content/Update/<?php echo $content_row["Content_id"]; ?>" class="btn btn-info btn-xs tipsi" title="" data-original-title="Düzenle"><i class="fa fa-edit"></i></a>
<a href="javascript:void(0);" class="btn btn-danger btn-xs tipsi delete_link" title="" data-original-title="Sil"  data-id="<?php echo $content_row["Content_id"]; ?>"><i class="fa fa-times"></i></a>
                                            </td>
                              </tr>
                              
                             <?php $i++;} // end each for main level?>
                              </tbody>
                          </table>
                     </div>
                        </div>
                    </div>
                </div>