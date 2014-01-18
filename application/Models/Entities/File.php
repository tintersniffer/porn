<?php
namespace Models\Entities;


/**
 * @Entity(readOnly=false, repositoryClass="\Models\Repositories\FileRepository")
 * @Table(name="files")
 */
Class File
{
	
	
	/** @Id
	 * @Column(name="id", type="integer")
	 * @GeneratedValue(strategy="IDENTITY") **/
	protected  $id;

	
	// mp4 only, string
	protected $type = 'mp4';
	
	//string
	protected $url;
	
	//อันนี้เดี๋ยวกุทำเอง
//  	protected $screenShots;

	
	
	
	
}