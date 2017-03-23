Aasta Tegija 2017
===
Online HTML/CSS test environment for Tartu Vocational Education Centre that
won first place in school competition. This project uses 
[Halo PHP framework](https://github.com/henno/halo).

Overview
------
##### Front-end
Front-end (client side) starts with welcome view, which introduces the test. From there
the user can login using their credentials and PIN given by the teacher. The test starts
with theoretical quiz (the number of questions are assigned in back-end settings). The
questions and the question answers are shuffled randomly and stored in the users session.
The second part is the practical test which is also assigned randomly and stored in the
users session. Depending on the back end settings, the live code preview iframe is hidden or 
visible. The textarea uses [CodeMirror](https://github.com/codemirror/CodeMirror) text
editor. After practical test the user is presented with their submitted practical assignmet 
(iframe) and they can finish the test. The last view shows their theoretical test result
and they will be redirected to homepage automatically after 15 seconds.