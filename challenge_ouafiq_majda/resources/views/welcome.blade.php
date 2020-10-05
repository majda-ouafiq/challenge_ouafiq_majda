<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Q & A</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('assets/css/one-page-wonder.min.css') }}" rel="stylesheet">
  
</head>

<body>


  <header class="masthead text-center text-white">
  <div class="col-lg-6 offset-lg-3">
    <div class="masthead-content">
      <div class="container">
        <h1 class="masthead-heading mb-0">Q & A</h1>
        {!! Form::open(array('url' => '/questions/'. $id.'/answers')) !!}
         {!! Form::textarea('question',null, 
                  array(
                  'rows'=>'2',
                  'class'=>'form-control',
                  'placeholder'=>'How come we don t eat dogs?')) !!} 
                  @if ($errors->any())
                      <div class="alert alert-warning text-left">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
        <button type="submit" class="btn btn-secondary btn-xl rounded-pill mt-5">ASK AWAY</button>
        {!! Form::close() !!}
      </div>
    </div>
    
    
  
    <div class="bg-circle-4 bg-circle"></div>
    <div class="bg-circle-2 bg-circle"></div>
    <div class="bg-circle-1 bg-circle"></div>
    <div class="bg-circle-3 bg-circle"></div>
    </div>
  </header>
  
  <section>
  <div class="col-lg-6 offset-lg-3">
            <h2 class="display-4">QUESTIONS</h2>
            @forelse($questions as $question)
            <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
            <h3 class="m-0">
            <a href="{{ url('/questions/'. $question->id ).'/answers' }}" class="text-reset"><p>{{ $question->question }}</p></a>
        
            </h3>
              <div>
                <span class="badge  badge-secondary rounded-pill mt-5">
                {{ $question->number_answer }} answers
                </span>
            </div>
            </div>
            @empty<p class="border-bottom pb-3 font-weight-bold">
                              No questions yet! Be the first to ask a question by using the form above.
                  </p>
            @endforelse
          </div>
        </div>
    
      </div>
    </div>
    </div>
  </section>
  

  <!-- Footer -->
  <footer class="py-5 bg-black">
    <div class="container">
      <p class="m-0 text-center text-white small">© 2020 MAJDA OUAFIQ. All rights reserved.</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
