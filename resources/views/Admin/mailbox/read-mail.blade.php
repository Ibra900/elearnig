@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Compose</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Read mail</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <a href="{{ route('admin.mailbox.index') }}" class="btn btn-primary btn-block mb-3">Back to Inbox</a>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Folders</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item active">
                                    <a href="{{ route('admin.mailbox.index') }}" class="nav-link">
                                        <i class="fas fa-inbox"></i> Inbox
                                        @if($new != 0)
                                            <span class="badge bg-primary float-right">{{ $new }}</span>
                                        @endif
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.mailbox.send') }}" class="nav-link">
                                        <i class="far fa-envelope"></i> Send
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file-alt"></i> Drafts
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-filter"></i> Junk
                                        <span class="badge bg-warning float-right">65</span>
                                    </a>
                                </li> -->
                                <li class="nav-item">
                                        <a href="{{ route('admin.mailbox.trash') }}" class="nav-link">
                                        <i class="far fa-trash-alt"></i> Trash
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Labels</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="far fa-circle text-danger"></i> Important</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="far fa-circle text-warning"></i> Promotions</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="far fa-circle text-primary"></i> Social</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Read Mail</h3>

                            <div class="card-tools">
                                <a href="#" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a>
                                <a href="#" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="mailbox-read-info">
                                <h5>Subject : <strong>{{ $mailbox->subject }}</strong></h5>
                                <h6>
                                    From: {{ $mailbox->senderEmail }} <br>
                                    <span class="mailbox-read-time float-right"> {{ $mailbox->created_at->format('j F, Y h:i:s A') }}</span>
                                    To: {{ $mailbox->receiverEmail }}
                                <h6>
                            </div>
                            <!-- /.mailbox-read-info -->
                            <!-- <div class="mailbox-controls with-border text-center"> -->
                                <!-- <div class="btn-group">

                                    <form action="{{ route('admin.mailbox.destroy', $mailbox->id) }}" class="d-inline"method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-default btn-sm" data-container="body" title="Delete">
                                        <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                    <button type="button" class="btn btn-default btn-sm" data-container="body" title="Reply">
                                        <i class="fas fa-reply"></i>
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm" data-container="body" title="Forward">
                                        <i class="fas fa-share"></i>
                                    </button>
                                </div> -->
                                <!-- /.btn-group -->
                                <!-- <button type="button" class="btn btn-default btn-sm" title="Print">
                                    <i class="fas fa-print"></i>
                                </button> -->
                            <!-- </div> -->
                            <!-- /.mailbox-controls -->
                            <div class="mailbox-read-message">
                                <p class="text-justify">
                                    {{ $mailbox->message }}
                                </p>

                                <p><strong>{{ $mailbox->name }}</strong></p>
                            </div>
                            <!-- /.mailbox-read-message -->
                        </div>
                        <!-- /.card-body -->
                        <!-- <div class="card-footer bg-white">
                            <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                                <li>
                                <span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span>

                                <div class="mailbox-attachment-info">
                                    <a href="#" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> Sep2014-report.pdf</a>
                                        <span class="mailbox-attachment-size clearfix mt-1">
                                        <span>1,245 KB</span>
                                        <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                                        </span>
                                </div>
                                </li>
                                <li>
                                <span class="mailbox-attachment-icon"><i class="far fa-file-word"></i></span>

                                <div class="mailbox-attachment-info">
                                    <a href="#" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> App Description.docx</a>
                                        <span class="mailbox-attachment-size clearfix mt-1">
                                        <span>1,245 KB</span>
                                        <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                                        </span>
                                </div>
                                </li>
                                <li>
                                <span class="mailbox-attachment-icon has-img"><img src="../../dist/img/photo1.png" alt="Attachment"></span>

                                <div class="mailbox-attachment-info">
                                    <a href="#" class="mailbox-attachment-name"><i class="fas fa-camera"></i> photo1.png</a>
                                        <span class="mailbox-attachment-size clearfix mt-1">
                                        <span>2.67 MB</span>
                                        <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                                        </span>
                                </div>
                                </li>
                                <li>
                                <span class="mailbox-attachment-icon has-img"><img src="../../dist/img/photo2.png" alt="Attachment"></span>

                                <div class="mailbox-attachment-info">
                                    <a href="#" class="mailbox-attachment-name"><i class="fas fa-camera"></i> photo2.png</a>
                                        <span class="mailbox-attachment-size clearfix mt-1">
                                        <span>1.9 MB</span>
                                        <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                                        </span>
                                </div>
                                </li>
                            </ul>
                        </div> -->
                        <!-- /.card-footer -->
                        <div class="card-footer">
                            <div class="float-right">
                                <!-- <button type="button" class="btn btn-default"><i class="fas fa-reply"></i> Reply</button> -->
                                <a href="{{ route('admin.mailbox.replyMail', $mailbox->id) }}" class="btn btn-default">
                                    <i class="fas fa-reply"></i>
                                </a>
                                <button type="button" class="btn btn-default"><i class="fas fa-share"></i> Forward</button>
                            </div>

                            <!-- <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button> -->

                            <button type="button" class="btn btn-default" title="delete" onclick="event.preventDefault(); document.getElementById('mail-{{ $mailbox->id}}').submit();">
                                <i class="far fa-trash-alt"></i>
                            </button>
                                <form id="mail-{{$mailbox->id}}" action="{{ route('admin.mailbox.destroy', $mailbox->id) }}" class="d-inline"method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
