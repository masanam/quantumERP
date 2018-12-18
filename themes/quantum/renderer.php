<?php
/**********************************************************************
    Copyright (C) WebAccounting, LLC.
	Released under the terms of the GNU General Public License, GPL, 
	as published by the Free Software Foundation, either version 3 
	of the License, or (at your option) any later version.
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  
    See the License here <http://www.gnu.org/licenses/gpl-3.0.html>.
***********************************************************************/
// Author: Joe Hunt, 09/13/2010
include_once('xpMenu.class.php');

	class renderer
	{
		function wa_header()
		{
			/*page(_($help_context= "Main Menu"), false, true);
			$js = '';
			$js .= get_js_open_window(900, 500);
			$js .= get_js_date_picker();*/
			page(_($help_context= "Main Menu"), false, false, "", $js);
		}

		function wa_footer()
		{
			end_page(false, true);
		}
		function shortcut($url, $label) 
		{
			echo "<li>";
			echo menu_link($url, $label);
			echo "</li>";
		}
		function menu_header($title, $no_menu, $is_index)
		{
			global $path_to_root, $help_base_url, $power_by, $version, $db_connections, $installed_extensions;
			include($path_to_root . "/themes/quantum/javascripts/FusionCharts_Gen.php");
		    echo "<script type='text/javascript' src='$path_to_root/themes/quantum/javascripts/FusionCharts.js'></script>";	

		

			$sel_app = $_SESSION['sel_app'];
			//echo "<div id='side-navigation'>";
			if (!$no_menu)
			{
				$applications = $_SESSION['App']->applications;
				$local_path_to_root = $path_to_root;
				
				add_access_extensions();
				$app = $sel_application;
				$xpmenu = new xpMenu();
				$xpmenu->addMenu($sel_app);
				$acc = access_string($app->name);
				$i = $j = 0;
				foreach($applications as $app)
				{
					if ($sel_app == $app->id)
						$sel_application = $app;
					$acc = access_string($app->name);
/*					echo "<li ".($sel_app == $app->id ? "class='active' " : "") . "><a href='$local_path_to_root/index.php?application=" . $app->id
						."'$acc[1]><b>" . $acc[0] . "</b></a></li>\n";
	*/
				}
echo "				
<div id='header'>
            <div class='judul'>
                <a href='index.php?application=home'><img src='$path_to_root/themes/quantum/images1/logo.png' height='70px'></a>
            </div>";
	echo '		
			<div class="top-navigation">
            <div class="user-navigation">
                <ul>';
                    echo "<li><a href='$path_to_root/admin/display_prefs.php?'>" . _("Preferences") . "</a></li>\n";
				echo " <li><a href='$path_to_root/admin/change_current_user_password.php?selected_id=" . $_SESSION["wa_current_user"]->username . "'>" . _("Change password") . "</a></li>\n";
			 	if ($help_base_url != null)
					echo "  <li><a target = '_blank' onclick=" .'"'."javascript:openWindow(this.href,this.target); return false;".'" '. "href='". 
						help_url()."'>$himg" . _("Help") . "</a></li>";
				echo "  <li><a href='$path_to_root/access/logout.php?'>" . _("Logout") . "</a></li>";
                echo '</ul>
            </div>
    </div>

            <a href="javascript:;" id="reveal-nav">
				<span class="reveal-bar"></span>
                <span class="reveal-bar"></span>
                <span class="reveal-bar"></span>

            </a>
        </div>
        <!-- #header -->

        <div id="body">
            <div id="sidebar">';
                
				/* */
				
				if (!$no_menu)
			{		
				add_access_extensions();
				
				$app = $sel_application;
				$xpmenu = new xpMenu();
				$xpmenu->addMenu($sel_app);
				$acc = access_string($app->name);
				$imgs = array('orders'=>'invoice.gif', 'AP'=>'receive.gif', 'stock'=>'basket.png',
				 	'manuf'=>'cog.png', 'proj'=>'time.png', 'GL'=>'gl.png', 'system'=>'controller.png');
				//if (!isset($imgs[$app->id]))
				//$xpmenu->addCategory($app->id, $acc[0], "$local_path_to_root/themes/quantum1/images/plus.png", $app->id);
				echo '<div class="module_header"> '.$acc[0].'</div>';
				$i = $j = 0;
				
					echo '<ul id="mainNav">';
					
				foreach ($app->modules as $module)
				{
				
					$i++;
					
					echo '<li id="Li'.$i.'" class="nav"><a href="javascript:;">'.$module->name.'</a>';
					
					$apps = array();
					foreach ($module->lappfunctions as $appfunction)
						$apps[] = $appfunction;
					foreach ($module->rappfunctions as $appfunction)
						$apps[] = $appfunction;
					$application = array();	
				
							echo '<ul class="subNav">';
					foreach ($apps as $application)	
					{
						$lnk = access_string($application->label);
						if ($_SESSION["wa_current_user"]->can_access_page($application->access))
						{
							if ($application->label != "")
							{
								
								
								echo "<li><a href='$path_to_root/$application->link'>{$lnk[0]}</a></li>\n";
							}
						}
						else	
							echo "<li><a href='#'></a>{$lnk[0]}</li>\n";
					}
					$j++;	
							echo "</li></ul>\n";	
						echo "</li>\n";
				}
				
				echo "</ul>";
				
				/*echo '<div class="text-center" style="margin-top: 60px">
      <div class="easy-pie-chart-percent" style="display: inline-block" data-percent="89"><span>89%</span></div>
      <div style="padding-top: 20px"><b>CPU Usage</b></div>
    </div>';*/
				
				echo "</div>";	
				
				
			}
				/* */
				
				
              

           echo' <section class="featured">
                <div id="content">
                    <div id="contentHeader">';
				echo "<ul>\n";
					
				foreach($applications as $app)
				{
					if ($sel_app == $app->id)
						$sel_application = $app;
					$acc = access_string($app->name);
					echo "<li ".($sel_app == $app->id ? "class='active' " : "") . "><a href='$local_path_to_root/index.php?application=" . $app->id
						."'$acc[1]><b>" . $acc[0] . "</b></a></li>\n";
				}
				echo "</ul>\n"; 
                    echo '</div>';
		echo "<div class='container'>
                        <div class='grid-24'>                          

                            <div>
                                <div class='grid-24'>
                                    <div class='widget'>";		
			}
			if ($no_menu)
				echo "<br>";
			elseif ($title && !$no_menu && !$is_index)
			{
				echo "<center><table id='title'><tr><td width='100%' class='titletext'>$title</td>"
				."<td align=right>"
				.(user_hints() ? "<span id='hints'></span>" : '')
				."</td>"
				."</tr></table></center>";
			}
                                       
                                   
				
		}

		function menu_footer($no_menu, $is_index)
		{
			global $path_to_root, $power_url, $power_by, $version, $db_connections;
			include_once($path_to_root . "/includes/date_functions.inc");

			if (!$no_menu)
			 echo "</div>
                                </div>
                            </div>

                            
                        </div>

                        <div class='grid-7'></div>
                    </div>
                </div>
            </section>

            <section class='content-wrapper main-content clear-fix'></section>
        </div>";
			if (!$no_menu)
			{
			
				echo "

        <div id='footer'>";
				if (isset($_SESSION['wa_current_user']))
				{
  				    echo "<span style='float:left;margin-left:220px;'>Welcome" . $_SESSION["wa_current_user"]->name . " - ";
					echo "".Today() . "&nbsp;" . Now()."</span>\n";
					echo "<span class='date'>$power_by</span>\n";
					//echo "<span class='date'>" . $db_connections[$_SESSION["wa_current_user"]->company]["name"] . "</span>\n";
					//echo "<span class='date'>" . $_SERVER['SERVER_NAME'] . "</span>\n";
					
					//echo "<span class='date'>" . _("Theme:") . " " . user_theme() . "</span>\n";
					//echo "<span class='date'>".show_users_online()."</span>\n";
				}
				echo "</div>\n"; // footer
			}
			echo "<script type='text/javascript' src='$path_to_root/themes/quantum/js/all.js'></script>";
			/*echo '
			<script>
			$.ajaxSetup ({  
			    cache: false  
			});

			var navItems = $(".subNav").find("a"),
				spinner = "<div align=\'center\'><img src=\'themes/quantum/images/ajax-loader.gif\' alt=\'loading...\' class=\'spinner\'></div>";  

			navItems.click(function(e){
				e.preventDefault();
				navItems.removeClass("current");

				var $this = $(this),
					loc = $this.attr("href");
				
				$(".container").html(spinner).load(loc); 
 
				$this.addClass("current");

			});
		</script>
			';*/
			echo "
			<script>

$(function () {
var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		
		$('#calendar-holder').fullCalendar({
			header: {
				left: 'prev, next',
				center: 'title',
				right: 'month,basicWeek,basicDay,'
			},
			editable: true,
			droppable: true, // this allows things to be dropped onto the calendar !!!
			drop: function(date, allDay) { // this function is called when something is dropped
			
				// retrieve the dropped element's stored Event Object
				var originalEventObject = $(this).data('eventObject');
				
				// we need to copy it, so that multiple events don't have a reference to the same object
				var copiedEventObject = $.extend({}, originalEventObject);
				
				// assign it the date that was reported
				copiedEventObject.start = date;
				copiedEventObject.allDay = allDay;
				
				// render the event on the calendar
				$('#calendar-holder').fullCalendar('renderEvent', copiedEventObject, true);
				
				//if ($('#drop-remove').is(':checked')) {
					$(this).remove();
				//}
				
			},
			events: [
				{
					title: 'All Day Event',
					start: new Date(y, m, 1)
				},
				{
					title: 'Long Event',
					start: new Date(y, m, d-5),
					end: new Date(y, m, d-2)
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: new Date(y, m, d-3, 16, 0),
					allDay: false
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: new Date(y, m, d+4, 16, 0),
					allDay: false
				},
				{
					title: 'Meeting',
					start: new Date(y, m, d, 10, 30),
					allDay: false
				},
				{
					title: 'Lunch',
					start: new Date(y, m, d, 12, 0),
					end: new Date(y, m, d, 14, 0),
					allDay: false
				},
				{
					title: 'Birthday Party',
					start: new Date(y, m, d+1, 19, 0),
					end: new Date(y, m, d+1, 22, 30),
					allDay: false
				},
				{
					title: 'Click for Google',
					start: new Date(y, m, 28),
					end: new Date(y, m, 29),
					url: 'http://google.com/'
				}
			]
		});
		
		
		
		
	/* initialize the external events
		-----------------------------------------------------------------*/
	
		$('#external-events div.external-event').each(function() {
		
			// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			// it doesn't need to have a start or end
			var eventObject = {
				title: $.trim($(this).text()) // use the element's text as the event title
			};
			
			// store the Event Object in the DOM element so we can get to it later
			$(this).data('eventObject', eventObject);
			
			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});
			
		});
});

</script>";
		}

		function display_applications(&$waapp)
		{
			global $path_to_root, $use_popup_windows;
			include_once("$path_to_root/includes/ui.inc");
			include_once($path_to_root . "/reporting/includes/class.graphic.inc");
			include($path_to_root . "/includes/system_tests.inc");

			if ($use_popup_windows)
			{
				echo "<script language='javascript'>\n";
				echo get_js_open_window(900, 500);
				echo "</script>\n"; 
			}
			$selected_app = $waapp->get_selected_application();
			// first have a look through the directory, 
			// and remove old temporary pdfs and pngs
			$dir = company_path(). '/pdf_files';
	
			if ($d = @opendir($dir)) {
				while (($file = readdir($d)) !== false) {
					if (!is_file($dir.'/'.$file) || $file == 'index.php') continue;
				// then check to see if this one is too old
					$ftime = filemtime($dir.'/'.$file);
				 // seems 3 min is enough for any report download, isn't it?
					if (time()-$ftime > 180){
						unlink($dir.'/'.$file);
					}
				}
				closedir($d);
			}

			if (method_exists($selected_app, 'render_index'))
				$selected_app->render_index();
            elseif ($selected_app->id == "home")
				display_home();			
			elseif ($selected_app->id == "calendar")
				display_calendar();					
			elseif ($selected_app->id == "orders")
				display_customer_topten();
			elseif ($selected_app->id == "AP")
				display_supplier_topten();
			elseif ($selected_app->id == "stock")
				display_stock_topten();
			elseif ($selected_app->id == "manuf")
				display_stock_topten(true);
			elseif ($selected_app->id == "proj")
				display_dimension_topten();
			elseif ($selected_app->id == "GL")
				display_gl_info();
			elseif ($selected_app->id == "system")
			{
				$title = "Display System Diagnostics";
				br(2);
				display_heading($title);
				br();
				//display_system_tests();
			}	
		}
	}
	
	function display_home()
	{
		global $path_to_root;
		
		$pg = new graph();

		if (!defined('FLOAT_COMP_DELTA'))	
			define('FLOAT_COMP_DELTA', 0.004);

		$begin = begin_fiscalyear();
		$today = Today();
		$begin1 = date2sql($begin);
		$today1 = date2sql($today);
		$sql = "SELECT SUM((ov_amount + ov_discount) * rate * IF(trans.type = ".ST_CUSTCREDIT.", -1, 1)) AS total,d.debtor_no, d.name FROM
			".TB_PREF."debtor_trans AS trans, ".TB_PREF."debtors_master AS d WHERE trans.debtor_no=d.debtor_no
			AND (trans.type = ".ST_SALESINVOICE." OR trans.type = ".ST_CUSTCREDIT.")
			AND tran_date >= '$begin1' AND tran_date <= '$today1' GROUP by d.debtor_no ORDER BY total DESC, d.debtor_no 
			LIMIT 10";
		$result = db_query($sql);
		/*
		$title = _("Top 10 customers in fiscal year");
		br(2);
		//display_heading($title);
		br();
		$th = array(_("Customer"), _("Amount"));
		
		start_table(TABLESTYLE, "width=30%");
		table_header($th);
		$k = 0; //row colour counter
		$i = 0;
		while ($myrow = db_fetch($result))
		{
	    	alt_table_row_color($k);
	    	$name = $myrow["debtor_no"]." ".$myrow["name"];
    		label_cell($name);
		    amount_cell($myrow['total']);
		    $pg->x[$i] = $name; 
		    $pg->y[$i] = $myrow['total'];
		    $i++;
			end_row();
		}
		end_table(2);
		$pg->title     = $title;
		$pg->axis_x    = _("Customer");
		$pg->axis_y    = _("Amount");
		$pg->graphic_1 = $today;
		$pg->type      = 2;
		$pg->skin      = 1;
		$pg->built_in  = false;
		$filename = company_path(). "/pdf_files/". uniqid("").".png";
		$pg->display($filename, true);
		start_table(TABLESTYLE);
		start_row();
		echo "<td>";
		echo "<img src='$filename' border='0' alt='$title'>";
		echo "</td>";
		end_row();
		end_table(1);
		*/
		$today = date2sql(Today());
		$sql = "SELECT trans.trans_no, trans.reference,	trans.tran_date, trans.due_date, debtor.debtor_no, 
			debtor.name, branch.br_name, debtor.curr_code,
			(trans.ov_amount + trans.ov_gst + trans.ov_freight 
				+ trans.ov_freight_tax + trans.ov_discount)	AS total,  
			(trans.ov_amount + trans.ov_gst + trans.ov_freight 
				+ trans.ov_freight_tax + trans.ov_discount - trans.alloc) AS remainder,
			DATEDIFF('$today', trans.due_date) AS days 	
			FROM ".TB_PREF."debtor_trans as trans, ".TB_PREF."debtors_master as debtor, 
				".TB_PREF."cust_branch as branch
			WHERE debtor.debtor_no = trans.debtor_no AND trans.branch_code = branch.branch_code
				AND trans.type = ".ST_SALESINVOICE." AND (trans.ov_amount + trans.ov_gst + trans.ov_freight 
				+ trans.ov_freight_tax + trans.ov_discount - trans.alloc) > ".FLOAT_COMP_DELTA." 
				AND DATEDIFF('$today', trans.due_date) > 0 ORDER BY days DESC";
		$result = db_query($sql);
		$title1 = _(" Overdue Sales Invoices");
		$title = db_num_rows($result) . _(" Overdue Sales Invoices");
		
		
		echo "<div class='grid-24'>";
		echo "<div class='widget-line'>";
		
			include($path_to_root . "/themes/quantum/javascripts/speed.php");
			
		echo "</div>";		
		echo "</div>";
		
		echo "<div class='grid-12'>";
		echo "<div class='widget-line'>";
		
			include($path_to_root . "/themes/quantum/javascripts/chart1.php");
			echo "<div align='center'><table class='tablestyle_noborder' width=95% cellpadding=2 cellspacing=0>";
			echo "<tr>";
			echo "<td class='tableheader' >Produk</td>";
			echo "<td class='tableheader' >Penjualan</td>";
			echo "<td class='tableheader' >Persentase</td>";		
			echo "</tr>";
			echo "<tr class='oddrow'>";
			echo "<td>Pentium 4</td>";
			echo "<td align='center'>150</td>";
			echo "<td align='center'>16%</td>";		
			echo "</tr>";
			echo "<tr class='evenrow'>";
			echo "<td>Pentium I3</td>";
			echo "<td align='center'>250</td>";
			echo "<td align='center'>26%</td>";		
			echo "</tr>";
			echo "<tr class='oddrow'>";
			echo "<td>Pentium I5</td>";
			echo "<td align='center'>100</td>";
			echo "<td align='center'>11%</td>";		
			echo "</tr>";
			echo "<tr class='evenrow'>";
			echo "<td>Pentium I7</td>";
			echo "<td align='center'>450</td>";
			echo "<td align='center'>47%</td>";		
			echo "</tr>";
			
			
			echo "</table></div><br>";
			echo "<div align='center'>";
		//echo '<input type="button" class="ajaxsubmit" value="More Detail" onclick="window.location.href=\'#\';">';
		echo "<a href='index.php?application=orders'>";
		echo '<span class="ajaxsubmit">More Detail</span>';		
		echo "</a>";
		echo "</div><br>";
		echo "</div>";		
		echo "</div>";
		
		echo "<div class='grid-12'>";
		echo "<div class='widget-line'>";
		
			include($path_to_root . "/themes/quantum/javascripts/chart2.php");
		
			echo "<div align='center'><table class='tablestyle_noborder' width=95% cellpadding=2 cellspacing=0>";
			echo "<tr>";
			echo "<td class='tableheader' >Bulan</td>";
			echo "<td class='tableheader' >Penjualan</td>";
			echo "<td class='tableheader' >Persentase</td>";		
			echo "</tr>";
			echo "<tr class='oddrow'>";
			echo "<td>Januari</td>";
			echo "<td align='center'>200</td>";
			echo "<td align='center'>19%</td>";		
			echo "</tr>";
			echo "<tr class='evenrow'>";
			echo "<td>Februari</td>";
			echo "<td align='center'>250</td>";
			echo "<td align='center'>23%</td>";		
			echo "</tr>";
			echo "<tr class='oddrow'>";
			echo "<td>Maret</td>";
			echo "<td align='center'>180</td>";
			echo "<td align='center'>17%</td>";		
			echo "</tr>";
			echo "<tr class='evenrow'>";
			echo "<td>April</td>";
			echo "<td align='center'>450</td>";
			echo "<td align='center'>42%</td>";		
			echo "</tr>";
			
			
			echo "</table></div><br>";
			echo "<div align='center'>";
		echo "<a href='index.php?application=orders'>";
		echo '<span class="ajaxsubmit">More Detail</span>';		
		echo "</a>";
				echo "</div><br>";
		echo "</div>";		
		echo "</div>";
		
		echo "<div class='grid-12'>";
		echo "<div class='widget-line'>";
			include($path_to_root . "/themes/quantum/javascripts/chart3.php");
		echo "</div>";		
		echo "</div>";
		echo "<div class='grid-12'>";
		echo "<div class='widget-line'>";
			include($path_to_root . "/themes/quantum/javascripts/chart4.php");
		echo "</div>";		
		echo "</div>";
	}
	
	function display_customer_topten()
	{
		global $path_to_root;
		
		$pg = new graph();

		if (!defined('FLOAT_COMP_DELTA'))	
			define('FLOAT_COMP_DELTA', 0.004);

		$begin = begin_fiscalyear();
		$today = Today();
		$begin1 = date2sql($begin);
		$today1 = date2sql($today);
		$sql = "SELECT SUM((ov_amount + ov_discount) * rate * IF(trans.type = ".ST_CUSTCREDIT.", -1, 1)) AS total,d.debtor_no, d.name FROM
			".TB_PREF."debtor_trans AS trans, ".TB_PREF."debtors_master AS d WHERE trans.debtor_no=d.debtor_no
			AND (trans.type = ".ST_SALESINVOICE." OR trans.type = ".ST_CUSTCREDIT.")
			AND tran_date >= '$begin1' AND tran_date <= '$today1' GROUP by d.debtor_no ORDER BY total DESC, d.debtor_no 
			LIMIT 10";
		$result = db_query($sql);
		
		$title = _("Top 10 customers in fiscal year");
		br(2);
		//display_heading($title);
		br();
		$th = array(_("Customer"), _("Amount"));
		
		start_table(TABLESTYLE, "width=30%");
		table_header($th);
		$k = 0; //row colour counter
		$i = 0;
		while ($myrow = db_fetch($result))
		{
	    	alt_table_row_color($k);
	    	$name = $myrow["debtor_no"]." ".$myrow["name"];
    		label_cell($name);
		    amount_cell($myrow['total']);
		    $pg->x[$i] = $name; 
		    $pg->y[$i] = $myrow['total'];
		    $i++;
			end_row();
		}
		end_table(2);
		$pg->title     = $title;
		$pg->axis_x    = _("Customer");
		$pg->axis_y    = _("Amount");
		$pg->graphic_1 = $today;
		$pg->type      = 2;
		$pg->skin      = 1;
		$pg->built_in  = false;
		$filename = company_path(). "/pdf_files/". uniqid("").".png";
		$pg->display($filename, true);
		start_table(TABLESTYLE);
		start_row();
		echo "<td>";
		echo "<img src='$filename' border='0' alt='$title'>";
		echo "</td>";
		end_row();
		end_table(1);
		
		$today = date2sql(Today());
		$sql = "SELECT trans.trans_no, trans.reference,	trans.tran_date, trans.due_date, debtor.debtor_no, 
			debtor.name, branch.br_name, debtor.curr_code,
			(trans.ov_amount + trans.ov_gst + trans.ov_freight 
				+ trans.ov_freight_tax + trans.ov_discount)	AS total,  
			(trans.ov_amount + trans.ov_gst + trans.ov_freight 
				+ trans.ov_freight_tax + trans.ov_discount - trans.alloc) AS remainder,
			DATEDIFF('$today', trans.due_date) AS days 	
			FROM ".TB_PREF."debtor_trans as trans, ".TB_PREF."debtors_master as debtor, 
				".TB_PREF."cust_branch as branch
			WHERE debtor.debtor_no = trans.debtor_no AND trans.branch_code = branch.branch_code
				AND trans.type = ".ST_SALESINVOICE." AND (trans.ov_amount + trans.ov_gst + trans.ov_freight 
				+ trans.ov_freight_tax + trans.ov_discount - trans.alloc) > ".FLOAT_COMP_DELTA." 
				AND DATEDIFF('$today', trans.due_date) > 0 ORDER BY days DESC";
		$result = db_query($sql);
		$title1 = _(" Overdue Sales Invoices");
		$title = db_num_rows($result) . _(" Overdue Sales Invoices");
		br(1);
		display_heading($title1);
		br();
		$th = array("#", _("Ref."), _("Date"), _("Due Date"), _("Customer"), _("Branch"), _("Currency"), 
			_("Total"), _("Days"));
		start_table(TABLESTYLE);
		table_header($th);
		$k = 0; //row colour counter
		while ($myrow = db_fetch($result))
		{
	    	alt_table_row_color($k);
			label_cell(get_trans_view_str(ST_SALESINVOICE, $myrow["trans_no"]));
			label_cell($myrow['reference']);
			label_cell(sql2date($myrow['tran_date']));
			label_cell(sql2date($myrow['due_date']));
	    	$name = $myrow["debtor_no"]." ".$myrow["name"];
    		label_cell($name);
    		label_cell($myrow['br_name']);
    		label_cell($myrow['curr_code']);
		    amount_cell($myrow['total']);
		    //amount_cell($myrow['remainder']);
		    label_cell($myrow['days'], "align='right'");
			end_row();
		}

		end_table(2);
		/*echo "<div class='grid-24'>";
		echo "<div class='widget-line'>";
		
			include($path_to_root . "/themes/quantum/javascripts/chart_sales1.php");
			echo "<div align='center'><table class='tablestyle_noborder' width=95% cellpadding=2 cellspacing=0>";
			echo "<tr>";
			echo "<td class='tableheader' >Produk</td>";
			echo "<td class='tableheader' >Penjualan</td>";
			echo "<td class='tableheader' >Persentase</td>";		
			echo "</tr>";
			echo "<tr class='oddrow'>";
			echo "<td>Pentium I</td>";
			echo "<td align='center'>200</td>";
			echo "<td align='center'>8%</td>";		
			echo "</tr>";
			echo "<tr class='evenrow'>";
			echo "<td>Pentium II</td>";
			echo "<td align='center'>250</td>";
			echo "<td align='center'>10%</td>";		
			echo "</tr>";
			echo "<tr class='oddrow'>";
			echo "<td>Pentium III</td>";
			echo "<td align='center'>180</td>";
			echo "<td align='center'>7%</td>";		
			echo "</tr>";
			echo "<tr class='evenrow'>";
			echo "<td>Pentium IV</td>";
			echo "<td align='center'>450</td>";
			echo "<td align='center'>18%</td>";		
			echo "</tr>";
			echo "</tr>";
			echo "<tr class='oddrow'>";
			echo "<td>Pentium I3</td>";
			echo "<td align='center'>200</td>";
			echo "<td align='center'>8%</td>";		
			echo "</tr>";
			echo "<tr class='evenrow'>";
			echo "<td>Pentium I5</td>";
			echo "<td align='center'>300</td>";
			echo "<td align='center'>12%</td>";		
			echo "</tr>";
			echo "<tr class='oddrow'>";
			echo "<td>Pentium I7</td>";
			echo "<td align='center'>380</td>";
			echo "<td align='center'>15%</td>";		
			echo "</tr>";
			echo "<tr class='evenrow'>";
			echo "<td>Multimedia Comp</td>";
			echo "<td align='center'>550</td>";
			echo "<td align='center'>22%</td>";		
			echo "</tr>";
			
			echo "</table></div><br>";
			echo "<div align='center'>";
		echo "</div><br>";
		echo "</div>";		
		echo "</div>";
		
		echo "<div class='grid-24'>";
		echo "<div class='widget-line'>";
		
			include($path_to_root . "/themes/quantum/javascripts/chart_sales2.php");
		
			echo "<div align='center'><table class='tablestyle_noborder' width=95% cellpadding=2 cellspacing=0>";
			echo "<tr>";
			echo "<td class='tableheader' >Bulan</td>";
			echo "<td class='tableheader' >Penjualan</td>";
			echo "<td class='tableheader' >Persentase</td>";		
			echo "</tr>";
			echo "<tr class='oddrow'>";
			echo "<td>Januari</td>";
			echo "<td align='center'>200</td>";
			echo "<td align='center'>8%</td>";		
			echo "</tr>";
			echo "<tr class='evenrow'>";
			echo "<td>Februari</td>";
			echo "<td align='center'>250</td>";
			echo "<td align='center'>10%</td>";		
			echo "</tr>";
			echo "<tr class='oddrow'>";
			echo "<td>Maret</td>";
			echo "<td align='center'>180</td>";
			echo "<td align='center'>7%</td>";		
			echo "</tr>";
			echo "<tr class='evenrow'>";
			echo "<td>April</td>";
			echo "<td align='center'>450</td>";
			echo "<td align='center'>18%</td>";		
			echo "</tr>";
			echo "</tr>";
			echo "<tr class='oddrow'>";
			echo "<td>Mei</td>";
			echo "<td align='center'>200</td>";
			echo "<td align='center'>8%</td>";		
			echo "</tr>";
			echo "<tr class='evenrow'>";
			echo "<td>Juni</td>";
			echo "<td align='center'>300</td>";
			echo "<td align='center'>12%</td>";		
			echo "</tr>";
			echo "<tr class='oddrow'>";
			echo "<td>Juli</td>";
			echo "<td align='center'>380</td>";
			echo "<td align='center'>15%</td>";		
			echo "</tr>";
			echo "<tr class='evenrow'>";
			echo "<td>Agustus</td>";
			echo "<td align='center'>550</td>";
			echo "<td align='center'>22%</td>";		
			echo "</tr>";
			
			echo "</table></div><br>";*/
			echo "<div align='center'>";
		echo "</div><br>";
		echo "</div>";		
		echo "</div>";
		
		
	}
	
	
	function display_supplier_topten()
	{
		global $path_to_root;
		
		$pg = new graph();

		if (!defined('FLOAT_COMP_DELTA'))	
			define('FLOAT_COMP_DELTA', 0.004);
		$begin = begin_fiscalyear();
		$today = Today();
		$begin1 = date2sql($begin);
		$today1 = date2sql($today);
		$sql = "SELECT SUM((trans.ov_amount + trans.ov_discount) * rate) AS total, s.supplier_id, s.supp_name FROM
			".TB_PREF."supp_trans AS trans, ".TB_PREF."suppliers AS s WHERE trans.supplier_id=s.supplier_id
			AND (trans.type = ".ST_SUPPINVOICE." OR trans.type = ".ST_SUPPCREDIT.")
			AND tran_date >= '$begin1' AND tran_date <= '$today1' GROUP by s.supplier_id ORDER BY total DESC, s.supplier_id 
			LIMIT 10";
		$result = db_query($sql);
		$title = _("Top 10 suppliers in fiscal year");
		br(2);
		display_heading($title);
		br();
		$th = array(_("Supplier"), _("Amount"));
		start_table(TABLESTYLE, "width=30%");
		table_header($th);
		$k = 0; //row colour counter
		$i = 0;
		while ($myrow = db_fetch($result))
		{
	    	alt_table_row_color($k);
	    	$name = $myrow["supplier_id"]." ".$myrow["supp_name"];
    		label_cell($name);
		    amount_cell($myrow['total']);
		    $pg->x[$i] = $name; 
		    $pg->y[$i] = $myrow['total'];
		    $i++;
			end_row();
		}
		end_table(2);
		$pg->title     = $title;
		$pg->axis_x    = _("Supplier");
		$pg->axis_y    = _("Amount");
		$pg->graphic_1 = $today;
		$pg->type      = 2;
		$pg->skin      = 1;
		$pg->built_in  = false;
		$filename = company_path(). "/pdf_files/". uniqid("").".png";
		$pg->display($filename, true);
		start_table(TABLESTYLE);
		start_row();
		echo "<td>";
		echo "<img src='$filename' border='0' alt='$title'>";
		echo "</td>";
		end_row();
		end_table(1);
		
		$today = date2sql(Today());
		$sql = "SELECT trans.trans_no, trans.reference, trans.tran_date, trans.due_date, s.supplier_id, 
			s.supp_name, s.curr_code,
			(trans.ov_amount + trans.ov_gst + trans.ov_discount) AS total,  
			(trans.ov_amount + trans.ov_gst + trans.ov_discount - trans.alloc) AS remainder,
			DATEDIFF('$today', trans.due_date) AS days 	
			FROM ".TB_PREF."supp_trans as trans, ".TB_PREF."suppliers as s 
			WHERE s.supplier_id = trans.supplier_id
				AND trans.type = ".ST_SUPPINVOICE." AND (ABS(trans.ov_amount + trans.ov_gst + 
					trans.ov_discount) - trans.alloc) > ".FLOAT_COMP_DELTA."
				AND DATEDIFF('$today', trans.due_date) > 0 ORDER BY days DESC";
		$result = db_query($sql);
//		$title = db_num_rows($result) . _(" overdue Purchase Invoices");
		$title = _(" Overdue Purchase Invoices");
		
		br(1);
		display_heading($title);
		br();
		$th = array("#", _("Ref."), _("Date"), _("Due Date"), _("Supplier"), _("Currency"), _("Total"), 
			_("Remainder"),	_("Days"));
		start_table(TABLESTYLE);
		table_header($th);
		$k = 0; //row colour counter
		while ($myrow = db_fetch($result))
		{
	    	alt_table_row_color($k);
			label_cell(get_trans_view_str(ST_SUPPINVOICE, $myrow["trans_no"]));
			label_cell($myrow['reference']);
			label_cell(sql2date($myrow['tran_date']));
			label_cell(sql2date($myrow['due_date']));
	    	$name = $myrow["supplier_id"]." ".$myrow["supp_name"];
    		label_cell($name);
    		label_cell($myrow['curr_code']);
		    amount_cell($myrow['total']);
		    amount_cell($myrow['remainder']);
		    label_cell($myrow['days'], "align='right'");
			end_row();
		}
		end_table(2);
	}

	function display_stock_topten($manuf=false)
	{
		global $path_to_root;
		
		$pg = new graph();

		$begin = begin_fiscalyear();
		$today = Today();
		$begin1 = date2sql($begin);
		$today1 = date2sql($today);
		$sql = "SELECT SUM((trans.unit_price * trans.quantity) * d.rate) AS total, s.stock_id, s.description, 
			SUM(trans.quantity) AS qty FROM
			".TB_PREF."debtor_trans_details AS trans, ".TB_PREF."stock_master AS s, ".TB_PREF."debtor_trans AS d 
			WHERE trans.stock_id=s.stock_id AND trans.debtor_trans_type=d.type AND trans.debtor_trans_no=d.trans_no
			AND (d.type = ".ST_SALESINVOICE." OR d.type = ".ST_CUSTCREDIT.") ";
		if ($manuf)
			$sql .= "AND s.mb_flag='M' ";
		$sql .= "AND d.tran_date >= '$begin1' AND d.tran_date <= '$today1' GROUP by s.stock_id ORDER BY total DESC, s.stock_id 
			LIMIT 10";
		$result = db_query($sql);
		if ($manuf)
			$title = _("Top 10 Manufactured Items in fiscal year");
		else	
			$title = _("Top 10 Sold Items in fiscal year");
		br(2);
		display_heading($title);
		br();
		$th = array(_("Item"), _("Amount"), _("Quantity"));
		start_table(TABLESTYLE, "width=30%");
		table_header($th);
		$k = 0; //row colour counter
		$i = 0;
		while ($myrow = db_fetch($result))
		{
	    	alt_table_row_color($k);
	    	$name = $myrow["description"];
    		label_cell($name);
		    amount_cell($myrow['total']);
		    qty_cell($myrow['qty']);
		    $pg->x[$i] = $name; 
		    $pg->y[$i] = $myrow['total'];
		    $i++;
			end_row();
		}
		end_table(2);
		$pg->title     = $title;
		$pg->axis_x    = _("Item");
		$pg->axis_y    = _("Amount");
		$pg->graphic_1 = $today;
		$pg->type      = 2;
		$pg->skin      = 1;
		$pg->built_in  = false;
		$filename = company_path(). "/pdf_files/". uniqid("").".png";
		$pg->display($filename, true);
		start_table(TABLESTYLE);
		start_row();
		echo "<td>";
		echo "<img src='$filename' border='0' alt='$title'>";
		echo "</td>";
		end_row();
		end_table(1);
	}
	
	function display_dimension_topten()
	{
		global $path_to_root;
		
		$pg = new graph();

		$begin = begin_fiscalyear();
		$today = Today();
		$begin1 = date2sql($begin);
		$today1 = date2sql($today);
		$sql = "SELECT SUM(-t.amount) AS total, d.reference, d.name FROM
			".TB_PREF."gl_trans AS t,".TB_PREF."dimensions AS d WHERE
			(t.dimension_id = d.id OR t.dimension2_id = d.id) AND
			t.tran_date >= '$begin1' AND t.tran_date <= '$today1' GROUP BY d.id ORDER BY total DESC LIMIT 10";
		$result = db_query($sql, "Transactions could not be calculated");
		$title = _("Top 10 Dimensions in fiscal year");
		br(2);
		display_heading($title);
		br();
		$th = array(_("Dimension"), _("Amount"));
		start_table(TABLESTYLE, "width=30%");
		table_header($th);
		$k = 0; //row colour counter
		$i = 0;
		while ($myrow = db_fetch($result))
		{
	    	alt_table_row_color($k);
	    	$name = $myrow['reference']." ".$myrow["name"];
    		label_cell($name);
		    amount_cell($myrow['total']);
		    $pg->x[$i] = $name; 
		    $pg->y[$i] = abs($myrow['total']);
		    $i++;
			end_row();
		}
		end_table(2);
		$pg->title     = $title;
		$pg->axis_x    = _("Dimension");
		$pg->axis_y    = _("Amount");
		$pg->graphic_1 = $today;
		$pg->type      = 5;
		$pg->skin      = 1;
		$pg->built_in  = false;
		$filename = company_path(). "/pdf_files/". uniqid("").".png";
		$pg->display($filename, true);
		start_table(TABLESTYLE);
		start_row();
		echo "<td>";
		echo "<img src='$filename' border='0' alt='$title'>";
		echo "</td>";
		end_row();
		end_table(1);
	}	

	function display_gl_info()
	{
		global $path_to_root;
		
		$pg = new graph();

		$begin = begin_fiscalyear();
		$today = Today();
		$begin1 = date2sql($begin);
		$today1 = date2sql($today);
		$sql = "SELECT SUM(amount) AS total, c.class_name, c.ctype FROM
			".TB_PREF."gl_trans,".TB_PREF."chart_master AS a, ".TB_PREF."chart_types AS t, 
			".TB_PREF."chart_class AS c WHERE
			account = a.account_code AND a.account_type = t.id AND t.class_id = c.cid
			AND IF(c.ctype > 3, tran_date >= '$begin1', tran_date >= '0000-00-00') 
			AND tran_date <= '$today1' GROUP BY c.cid ORDER BY c.cid"; 
		$result = db_query($sql, "Transactions could not be calculated");
		$title = _("Cash Balances");
		br(2);
		display_heading($title);
		br();
		start_table(TABLESTYLE2, "width=30%");
		$i = 0;
		$total = 0;
		while ($myrow = db_fetch($result))
		{
			if ($myrow['ctype'] > 3)
			{
		    	$total += $myrow['total'];
				$myrow['total'] = -$myrow['total'];
		    	$pg->x[$i] = $myrow['class_name']; 
		    	$pg->y[$i] = abs($myrow['total']);
		    	$i++;
		    }	
			label_row($myrow['class_name'], number_format2($myrow['total'], user_price_dec()), 
				"class='label' style='font-weight:bold;'", "style='font-weight:bold;' align=right");
		}
		$calculated = _("Calculated Return");
		label_row("&nbsp;", "");
		label_row($calculated, number_format2(-$total, user_price_dec()), 
			"class='label' style='font-weight:bold;'", "style='font-weight:bold;' align=right");
    	$pg->x[$i] = $calculated; 
    	$pg->y[$i] = -$total;
		
		end_table(2);
		$pg->title     = $title;
		$pg->axis_x    = _("Class");
		$pg->axis_y    = _("Amount");
		$pg->graphic_1 = $today;
		$pg->type      = 5;
		$pg->skin      = 1;
		$pg->built_in  = false;
		$filename = company_path(). "/pdf_files/". uniqid("").".png";
		$pg->display($filename, true);
		start_table(TABLESTYLE);
		start_row();
		echo "<td>";
		echo "<img src='$filename' border='0' alt='$title'>";
		echo "</td>";
		end_row();
		end_table(1);
	}	

function display_calendar()
	{
		global $path_to_root;
		
		echo "<div class='grid-24'>";
		echo '<div class="widget widget-calendar">
					
					<div class="widget-header">
						<span class="icon-calendar"></span>
						<h3>Kalender</h3>
					</div> <!-- .widget-header -->
				
					<div class="widget-content">						
						
						<div id="calendar-holder"></div>
				
					</div> <!-- .widget-content -->
				
				</div> <!-- .widget -->	';		
		echo "</div>";
	}	
?>