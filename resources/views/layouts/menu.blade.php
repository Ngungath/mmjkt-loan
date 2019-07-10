<li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
       <li class="treeview">
          <a href="#">
            <i class="fa fa-briefcase"></i> <span>JKT Units</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{route('units')}}"><i class="fa fa-circle-o"></i> All Units</a></li>
            <li><a href="{{route('units.create')}}"><i class="fa fa-circle-o"></i> Add Unit</a></li>
          </ul>
        </li>

         <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Borrowers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="active"><a href="{{route('borrower.index')}}"><i class="fa fa-circle-o"></i>View Borrowers
</a></li>
            <li><a href="{{route('borrower.create')}}"><i class="fa fa-circle-o"></i>Add Borrower
</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i>View Borrower Groups

</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i>Add Borrower Group
</a></li>
<li>
  <a href="{{route('suspended.borrowers')}}"><i
 class="fa fa-circle-o"></i> Suspended Borrowers
     <span class="pull-right-container">
      <span class="label label-danger pull-right">0</span>
     </span>
 </a>
</li>
          </ul>
        </li>
      <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i> <span>Loans</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{route('loans')}}"><i class="fa fa-circle-o"></i> View All Loans
                <span class="pull-right-container">
                <span class="label label-info pull-right">{{App\Loan::count()}}</span>
                </span>
            </a></li>
        <li>
          <a href="{{route('pending.loans')}}"><i
              class="fa fa-circle-o"></i> Pending Approval
                  <span class="pull-right-container">
                  <span class="label label-warning pull-right">{{App\Loan::where('loan_status','Pending')->count()}}</span>
                  </span>
                    </a>
                </li>
                <li>
                 <a href="{{route('declined.loans')}}"><i
                class="fa fa-circle-o"></i> Loans Declined
                    <span class="pull-right-container">
                     <span class="label label-danger pull-right">{{App\Loan::where('loan_status','Declined')->count()}}</span>
                    </span>
                </a>
              </li>
            
          <li><a href="#"><i
                  class="fa fa-circle-o"></i> Loan Calculator</a></li>
          <li><a href="{{route('lender')}}"><i
                  class="fa fa-bank"></i>Manage Lender</a></li>
          <li><a href="#"><i
                  class="fa fa-book"></i>Repayment Methods</a></li>
          <li><a href="{{route('loans.banch_payments')}}"><i
                  class="fa fa-book"></i>Banch Repayment</a></li>
          </ul>
        </li>
        <li class="treeview ">
          <a href="#">
           <i class="fa fa-dollar"></i> <span>Deductions</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
              <ul class="treeview-menu">
                  <li><a href="#"><i
                            class="fa fa-circle-o"></i> All Deductions
                                </a></li>
                          <li><a href="#"><i
                            class="fa fa-circle-o"></i> Manage Deductions
                                </a></li>
                            </ul>
                        </li>

                        <li class="treeview ">
                            <a href="#">
                             <i class="fa fa-bar-chart"></i> <span>Reports</span>
                                <span class="pull-right-container">
                                  <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{route('borrower.report')}}"><i
                                                class="fa fa-circle-o"></i> Borrower Reports
                                    </a></li>
                                <li><a href="#"><i
                                                class="fa fa-circle-o"></i> Loan Reports
                                    </a></li>
                                <li><a href="#"><i
                                                class="fa fa-circle-o"></i> Financial Reports
                                    </a></li>
                                <li><a href="#"><i
                                                class="fa fa-circle-o"></i> Organisation Reports
                                    </a></li>
                                <li><a href="#"><i
                                                class="fa fa-circle-o"></i> Savings Reports
                                    </a></li>

                            </ul>
                        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-briefcase"></i> <span>Communication</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i>Email</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i>SMS</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i>Manage SMS Gateways</a></li>
          </ul>
        </li>
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-briefcase"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{route('users')}}"><i class="fa fa-circle-o"></i>View Users</a></li>
            <li><a href="{{route('roles')}}"><i class="fa fa-circle-o"></i>Manage Roles</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i>Add Users</a></li>
          </ul>
        </li>
          <li class="">
            <a href="#">
               <i class="fa fa-cog"></i> <span>Settings</span>
                  </a>
                    </li>

      