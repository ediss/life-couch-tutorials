 {{ $name }} se prijavio na kurs {{ $course_name }}  {{route('single-course', $course_slug)}}#course-content
 
 
 Podaci o korisniku:

 Ime: {{$name}}
 E-mail: {{$email}}
 Godina rodjenja: {{$birth_year}}
 Pol: {{$gender == 'male' ? "muski" : "zenski"}}
 Broj telefona: {{$country_code ? $country_code ."/" : "" }}  {{$phone}}
 Status veze: {{$relationship}}
 Zanimanje: {{$profession}}
 Lokacija: {{$country}}

 Nacin placanja: {{ $payment_method }} ({{ $payment_country }})



