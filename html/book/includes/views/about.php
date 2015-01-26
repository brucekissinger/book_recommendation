<?php render('_header',array('title'=>$title, 'activePage'=>$activePage))?>

<H2>About</H2>

<p>
The book recommendation system provides a convenient way to browse new electronic books available from <a href="http://www.gutenberg.org/">Project Gutenberg</a> and provides recommendations for you.  Currently, nearly 43,000 books are available.</p>

<H2>How It Works</H2>
<OL>
<li>On a daily basis, a catalog of books is downloaded from Project Gutenberg and loaded into a database.  New books loaded within the last 30 days are displayed on the "New" tab of this web site.</li>
<li>Next, a list of the top downloads as reported by Project Gutenberg is also loaded into a database.  The most popular books are displayed under the "Popular" tab of this web site.</li>
<li>If you choose to use the recommendation option, a unique ID is assigned to you and stored on your web browser.  You are then asked to rate any book that you download.  Your ratings along with the relative popularity of each book is then fed into a recommendation engine named MyMediaLite.  Finally, MyMediaLite predicts which additional books you might enjoy.</li> 
</OL>

<H2>Recent Changes</H2>
 <p>
	<ol>
		<li>Improved detection of book popularity based on Gutenberg downloads</li>
		<li>Changed recommendation engine settings</li>
		<li>Changed parsing of book subjects</li>
	</ol> 
 </p>

<H2>Acknowledgements</H2>
 <p>
      MyMediaLite was developed by <a href="http://ismll.de/personen/gantner_en.html">Zeno Gantner</a>
,
      <a href="http://ismll.de/personen/rendle_en.html">Steffen Rendle</a>
, and
      <a href="http://ismll.de/personen/freudenthaler_en.html">Christoph Freudenthaler</a>
      at <a href="http://www.ismll.de">University of Hildesheim</a>.
  
      <br/>
      <br/>  

      The development of MyMediaLite was partly funded by the <a href="http://ec.europa.eu/research/fp7/index_en.cfm">European Commission 7th Framework Programme</a>
      project <a href="http://www.mymediaproject.org/">Dynamic Personalization of Multimedia (MyMedia)</a>
      under the grant agreement no. 215006.
    </p>



<H2>Legal Stuff</H2>
<p>
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.                                   
</p>

<?php render('_footer')?>
