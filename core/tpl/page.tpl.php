			<article>
				<header>
					<h1><?php echo $this->pageVars->pagetitle; ?></h1>
				</header>
				<section>
					<p><?php echo $this->pageVars->content; ?></p>
				</section>
				<footer>
					<h3>page info</h3>
					<p>Created by: <strong><?php echo $this->pageVars->author; ?></strong></p>
				</footer>
			</article>
			<aside>
				<h3>Did you know?</h3>
				<p><?php echo $this->pageVars->description; ?></p>
			</aside>