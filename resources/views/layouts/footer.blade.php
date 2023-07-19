<footer class="text-body-secondary py-5">
    <hr>
  <div class="container">
      <p class="float-end mb-1">
        <a href="#">Back to top</a>
      </p>
      <ul>
        @auth
          @foreach ($rubrics as $rubric)
          <li>
            <a href="">{{$rubric->title}}</a>
          </li>       
          @endforeach
        @endauth
        
      </ul>
      
      <div>
        {{date('d-M-Y H:i')}}
      </div>

    </div>

  </footer>

  <script src="{{asset("js/script.js")}}"></script>