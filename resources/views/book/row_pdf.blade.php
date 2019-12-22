<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Book Detail</title>
  </head>
  <body>
    <table class="table table-bordered">
    <thead>
      <tr>
        <td><b>Book Name</b></td>
        <td><b>Book Language</b></td>
        <td><b>Book Description</b></td>     
      </tr>
      </thead>
      <tbody>
      <tr>
        <td>
          {{$book->book_name}}
        </td>
        <td>
          {{$book->book_language}}
        </td>
        <td>
          {{$book->book_description}}
        </td>
      </tr>
      </tbody>
    </table>
  </body>
</html>