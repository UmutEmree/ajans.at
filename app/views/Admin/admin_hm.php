<div class="row">
                    <div class="col-md-12">
                        <div class="grid simple " style="padding-top:10px;">
                            
                           <div class="grid-title no-border"> 
                           <h3 class="content-header pull-left"><?php echo $page_label; ?></h3>
                              <div class="col-lg-5 pull-right text-right">
                        
                                 
                                <button id="editable-sample_new" class="btn btn-info tipsi"
                                       onclick="location.href='<?php echo SITE_URL ?>Admin/Admin/Insert'"
                                      title="Yeni Ekleme">
                                     Admin Ekle <i class="fa fa-plus"></i>
                                  </button>
                                   
                            </div>
                            <div class="clearfix"></div>
                            </div>
              
                            <div class="grid-body no-border">
                        <table class="table no-more-tables" id="example">
                              <thead>
                              <tr>
                              <th class="col-md-1">NO</th>
                                   <th>Yönetici Adı</th>
<th>Mail Adresi</th>
<th>Kullanıcı adı</th>
 

                                  <th>İşlem</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $i=1;
							 
							   foreach($content as $content_row){?>
                              <tr class=""
                              id="tr_<?php echo $content_row["Admin_id"]; ?>" >
                                  <td>
                                  <?php echo $i; ?>
                                  </td>
                                 

                                 <td><?=$content_row["Admin_Name"]; ?></td>
<td><?=$content_row["Admin_Mail"]; ?></td>
<td><?=$content_row["Admin_User_Name"]; ?></td>
 

                    
            
            <td>
<a href="<?php echo SITE_URL ?>Admin/Admin/Update/<?php echo $content_row["Admin_id"]; ?>" class="btn btn-info btn-xs tipsi" title="" data-original-title="Düzenle"><i class="fa fa-edit"></i></a>

<a href="javascript:void(0);" class="btn btn-danger btn-xs tipsi delete_link" title="" data-original-title="Sil"  data-id="<?php echo $content_row["Admin_id"]; ?>"><i class="fa fa-times"></i></a>
                                            </td>
                              </tr>
                              
                             <?php $i++;} // end each for main level?>
                              </tbody>
                          </table>
                     </div>
                        </div>
                    </div>
                </div>